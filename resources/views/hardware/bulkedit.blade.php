
@extends('layouts/edit-form', [
    'createText'  => trans('admin/hardware/form.create'),
    'updateText'  => trans('admin/hardware/form.update'),
    'helpTitle'   => trans('admin/hardware/general.about_assets_title'),
    'helpText'    => trans('admin/hardware/general.about_assets_text'),
    'formAction'  => route('hardware/bulkstore'),
])


{{-- Page content --}}

@section('inputFields')
  
  @include ('partials.forms.edit.model-select', ['translated_name' => trans('admin/hardware/form.model'), 'fieldname' => 'model_id', 'required' => 'true'])

  @include ('partials.forms.edit.status')

  <!-- Asset Tag -->
  <div class="asset-tag-parent">
  <div class="asset-tag form-group {{ $errors->has('asset_tag') ? ' has-error' : '' }}">
    <label for="asset_tag[]" class="col-md-3 control-label">{{ trans('admin/hardware/form.tag') }}</label>
    <div class="col-md-7 col-sm-12{{  (\App\Helpers\Helper::checkIfRequired($item, 'asset_tag[]')) ? ' required' : '' }}">
      @if  ($item->id)
      <input class="asset-tag-input form-control" type="text" name="asset_tag[]" id="asset_tag" value="{{ Input::old('asset_tag', $item->asset_tag) }}" />
      @else
      <input class="asset-tag-input form-control" type="text" name="asset_tag[]" id="asset_tag" value="{{ Input::old('asset_tag', \App\Models\Asset::autoincrement_asset()) }}">
      @endif
      {!! $errors->first('asset_tag', '<span class="alert-msg"><i class="fa fa-times"></i> :message</span>') !!}
    </div>
    <a class="col-md-1 triggernew btn btn-sm btn-success" onclick="newTag()">+</a>
    <a style="display: none" class="col-md-1 triggerdel btn btn-sm btn-danger" onclick="delTag(this)"><i class="fa fa-trash"></i></a>
  </div>
</div>
 
  @include ('partials.forms.edit.requestable', ['requestable_text' => trans('admin/hardware/general.requestable')])


@stop

@section('moar_scripts')
<script nonce="{{ csrf_token() }}">
    /*
    * Patrick mutwiri
    * new field on enter and after clicking plus
    */
    function newTag() {
      var i = 0,
      l = 0, 
      tags = document.getElementsByClassName("asset-tag"),
      newrecord = '',
      cln = '';
      l = tags.length;
      i = l-1;
      newrecord = tags[i];
      cln = newrecord.cloneNode(true);
      document.getElementsByClassName('asset-tag-parent')[0].appendChild(cln);
      document.getElementsByClassName('asset-tag-input')[l].value = '';
      document.getElementsByClassName('asset-tag-input')[l].focus();
      document.getElementsByClassName('triggerdel')[i].style.display = 'none';
      if(l>0) {
        document.getElementsByClassName('triggernew')[i].style.display = 'none';
        document.getElementsByClassName('triggerdel')[i].style.display = '';
      }
      //on enter, newTag
      const node = document.getElementsByClassName('asset-tag-input')[l];
      node.addEventListener("keydown", function(event) {
          if (event.key === "Enter") {           
              newTag();
              event.preventDefault();
          }
      });
      return false;
    }

    //on enter, newTag
    function newTagOnEnter(){
      //document.getElementById("create-form").addEventListener('submit',newTag());
      newTag();
      return false;
    }

    let tags = document.getElementsByClassName("asset-tag");
    for (var i = tags.length - 1; i >= 0; i--) {
      tags[i].addEventListener("keydown", function(event){ 
        if (event.keyCode == 13) {
          newTag(); 
        }
      }); 
    }

    function checkForm() {
      console.log('checked form');
    }

    /*
      * DELETE input
      * on click
    */
    function delTag(element) {
      element.parentNode.remove();
      console.log('remove element kabisaaaa');
    }

    // end patrick's block

    var transformed_oldvals={};

    function fetchCustomFields() {
        //save custom field choices
        var oldvals = $('#custom_fields_content').find('input,select').serializeArray();
        for(var i in oldvals) {
            transformed_oldvals[oldvals[i].name]=oldvals[i].value;
        }

        var modelid = $('#model_select_id').val();
        if (modelid == '') {
            $('#custom_fields_content').html("");
        } else {

            $.ajax({
                type: 'GET',
                url: "{{url('/') }}/models/" + modelid + "/custom_fields",
                headers: {
                    "X-Requested-With": 'XMLHttpRequest',
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                _token: "{{ csrf_token() }}",
                dataType: 'html',
                success: function (data) {
                    $('#custom_fields_content').html(data);
                    $('#custom_fields_content select').select2(); //enable select2 on any custom fields that are select-boxes
                    //now re-populate the custom fields based on the previously saved values
                    $('#custom_fields_content').find('input,select').each(function (index,elem) {
                        if(transformed_oldvals[elem.name]) {
                            $(elem).val(transformed_oldvals[elem.name]).trigger('change'); //the trigger is for select2-based objects, if we have any
                        }
                        
                    });
                }
            });
        }
    }

    function user_add(status_id) {

        if (status_id != '') {
            $(".status_spinner").css("display", "inline");
            $.ajax({
                url: "{{url('/') }}/api/v1/statuslabels/" + status_id + "/deployable",
                headers: {
                    "X-Requested-With": 'XMLHttpRequest',
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $(".status_spinner").css("display", "none");
                    $("#selected_status_status").fadeIn();

                    if (data == true) {
                        $("#assignto_selector").show();
                        $("#assigned_user").show();

                        $("#selected_status_status").removeClass('text-danger');
                        $("#selected_status_status").addClass('text-success');
                        $("#selected_status_status").html('<i class="fa fa-check"></i> That status is deployable. This asset can be checked out.');


                    } else {
                        $("#assignto_selector").hide();
                        $("#selected_status_status").removeClass('text-success');
                        $("#selected_status_status").addClass('text-danger');
                        $("#selected_status_status").html('<i class="fa fa-times"></i> That asset status is not deployable. This asset cannot be checked out. ');
                    }
                }
            });
        }
    }
    ;

    $(function () {
        //grab custom fields for this model whenever model changes.
        $('#model_select_id').on("change", fetchCustomFields);

        //initialize assigned user/loc/asset based on statuslabel's statustype
        user_add($(".status_id option:selected").val());

        //whenever statuslabel changes, update assigned user/loc/asset
        $(".status_id").on("change", function () {
            user_add($(".status_id").val());
        });

        $("#create-form").submit(function (event) {
            event.preventDefault();
            checkForm();
            //return sendForm();
        });

        /*
        * Change submit type to just a button, avoid enter press
        * Patrick mutwiri
        */
        $("#create-form").attr("onsubmit", "newTag()");
        $('form#create-form button[type=submit]').attr('type','mutwiri');
        // trigger type mutwiri for submit when clicked
        $('form#create-form button[type=mutwiri]').on('click',function(){
          return sendForm();
        });

        // Resize Files when chosen
        //First check to see if there is a file before doing anything else

        var imageData = "";
        var $fileInput = $('#uploadFile');
        $fileInput.on('change', function (e) {
            if ($fileInput != '') {
                if (window.File && window.FileReader && window.FormData) {
                    var file = e.target.files[0];
                    if (file) {
                        if (/^image\//i.test(file.type)) {
                            readFile(file);
                        } else {
                            alert('Invalid Image File :(');
                        }
                    }
                }
                else {
                    console.log("File API not supported, not resizing");
                }
            }
        });


        function readFile(file) {
            var reader = new FileReader();

            reader.onloadend = function () {
                processFile(reader.result, file.type);
            }

            reader.onerror = function () {
                alert("Unable to read file");
            }

            reader.readAsDataURL(file);
        }

        function processFile(dataURL, fileType) {
            var maxWidth = 800;
            var maxHeight = 800;

            var image = new Image();
            image.src = dataURL;

            image.onload = function () {
                var width = image.width;
                var height = image.height;
                var shouldResize = (width > maxWidth) || (height > maxHeight);

                if (!shouldResize) {
                    imageData = dataURL;
                    return;
                }

                var newWidth;
                var newHeight;

                if (width > height) {
                    newHeight = height * (maxWidth / width);
                    newWidth = maxWidth;
                } else {
                    newWidth = width * (maxHeight / height);
                    newHeight = maxHeight;
                }
                var canvas = document.createElement('canvas');

                canvas.width = newWidth;
                canvas.height = newHeight;

                var context = canvas.getContext('2d');

                context.drawImage(this, 0, 0, newWidth, newHeight);

                dataURL = canvas.toDataURL(fileType);

                imageData = dataURL;

            };

            image.onerror = function () {
                alert('Unable to process file :(');
            }
        }

        /*
        * Tag as serial:
        * Patrick mutwiri
        */
        // $('div.asset-tag.form-group a.triggernew').click(function(e){
        //     let thisdiv = $(this).parent('div.asset-tag').html();
        //     $('div.asset-tag.form-group').last().after
        //     ('<div class="asset-tag form-group">'+thisdiv+'</div>');
            
        //    e.preventDefault();
        // });
        $('form#create-form input.asset-tag-input').on('keydown',function( event ) {
          if ( event.which == 13 ) {
           event.preventDefault();
           $('form#create-form input.asset-tag-input').next('a.triggernew').trigger('click');
          }
        });

        function sendForm() {
            $('button[type=mutwiri] i.fa.icon-white').removeClass('fa-check').addClass('fa-spinner fa-spin');
            $('button[type=mutwiri] i.fa.icon-white').removeClass('fa-spinner fa-spin').addClass('fa-check');
            var form = $("#create-form").get(0);
            var formData = $('#create-form').serializeArray();
            formData.push({name: 'image', value: imageData});
            let model_id = '', asset_tag = '', status_id = '';
            for (var i = formData.length - 1; i >= 0; i--) {
              if(formData[i].name == 'model_id') {
                model_id = formData[i].value;
              }
              if(formData[i].name == 'status_id') {
                status_id = formData[i].value;
              }
              if(formData[i].name == 'asset_tag[]') {
                asset_tag = formData[i].value; //get atleast a val
              }
            }
            console.log('ATag '+asset_tag+', | Model id '+model_id+', | Stat ID '+status_id);
            if(!model_id || !status_id || !asset_tag) {
              //continue
              $('p#fields_required').remove();
              $('div#model_id').prepend('<p id="fields_required" style="" class="text-center text-danger"><i class="fa fa-times"></i> Fields Required. Please Check form</p>');
              $('button[type=mutwiri] i.fa.icon-white').removeClass('fa-check').addClass('fa-spinner fa-spin');
              $('button[type=mutwiri] i.fa.icon-white').removeClass('fa-spinner fa-spin').addClass('fa-check');
              return false;
            }
            $('p#fields_required').remove();
            // check if duplicates
            var duplicates = [], values = [], isDuplicated = false;
            $('input.asset-tag-input').each(function(){
              if(!this.value) return true;
              //If the stored array has this value, break from the each method
              if(values.indexOf(this.value) !== -1) {
                duplicates.push(this.value);
                //$('p.tag_duplicate').remove();
                $(this).addClass('btn-warning');
                $('div#model_id').prepend('<p style="" class="tag_duplicate text-center text-danger"><i class="fa fa-times"></i> Asset Serial/Tag <b>'+this.value+'</b> duplicated. Please correct.</p>');
              } else {
                $(this).removeClass('btn-warning');
              }
              values.push(this.value);
            });
            if(duplicates.length > 0) {
              $('button[type=mutwiri] i.fa.icon-white').removeClass('fa-spinner fa-spin').addClass('fa-check');
              console.log('duplicates '+duplicates);
              return false; // stop this bs
            }
            $.ajax({
                type: 'POST',
                url: form.action,
                headers: {
                    "X-Requested-With": 'XMLHttpRequest',
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                dataType: 'json',
                  beforeSend: function(data) {
                    $('button[type=mutwiri] i.fa.icon-white').removeClass('fa-check').addClass('fa-spinner fa-spin');
                  },
                  success: function (data) {
                      console.dir(data);
                      // AssetController flashes success to session, redirect to hardware page.
                      $('button[type=mutwiri] i.fa.icon-white').removeClass('fa-check').addClass('fa-spinner fa-spin');
                      if (data.redirect_url) {
                          setTimeout(function() {
                              $('button[type=mutwiri] i.fa.icon-white').removeClass('fa-spinner fa-spin').addClass('fa-check');
                              window.location.href = data.redirect_url;
                              return true;
                            }, 5000);
                      }
                      //window.location.reload(true);
                      return false;

                  },
                  error: function (data) {
                      // AssetRequest Validator will flash all errors to session, this just refreshes to see them.
                      window.location.reload(true);
                      console.log(JSON.stringify(data));
                      console.log('error submitting');
                  }
            });

            return false;
        }

    });
</script>
<style type="text/css">
  .btn-group-sm > .btn, .btn-sm {
    padding: 7px;
  }
</style>
@stop
