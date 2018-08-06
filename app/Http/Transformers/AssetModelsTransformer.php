<?php
namespace App\Http\Transformers;

use App\Models\AssetModel;
use Illuminate\Database\Eloquent\Collection;
use Gate;
use App\Helpers\Helper;

class AssetModelsTransformer
{

    public function transformAssetModels (Collection $assetmodels, $total)
    {
        $array = array();
        foreach ($assetmodels as $assetmodel) {
            $array[] = self::transformAssetModel($assetmodel);
        }
        return (new DatatablesTransformer)->transformDatatables($array, $total);
    }

    public function transformAssetModel (AssetModel $assetmodel)
    {

        $array = [
            'id' => (int) $assetmodel->id,
            'name' => e($assetmodel->name),
            'manufacturer' => ($assetmodel->manufacturer) ? [
                'id' => (int) $assetmodel->manufacturer->id,
                'name'=> e($assetmodel->manufacturer->name)
            ]  : null,
            'image' => ($assetmodel->image!='') ? app('models_upload_url').e($assetmodel->image) : null,
            'model_number' => e($assetmodel->model_number),
            'depreciation' => ($assetmodel->depreciation) ? [
                'id' => (int) $assetmodel->depreciation->id,
                'name'=> e($assetmodel->depreciation->name)
            ]  : null,
            'assets_count' => (int) $assetmodel->assets_count,
            'deployable' => Helper::getmodelTotals($assetmodel->id)['deployable'],
            'remainder' => Helper::getmodelTotals($assetmodel->id)['remainder'],
            'totalcheckedout' => Helper::getmodelTotals($assetmodel->id)['totalcheckedout'], 
            'totalunassigned' => Helper::getmodelTotals($assetmodel->id)['totalunassigned'], 
            'undeployable' => Helper::getmodelTotals($assetmodel->id)['undeployable'], 
            'pending' => Helper::getmodelTotals($assetmodel->id)['pending'], 
            'archived' => Helper::getmodelTotals($assetmodel->id)['archived'], 
            'deleted' => Helper::getmodelTotals($assetmodel->id)['deleted'], 
            'category' => ($assetmodel->category) ? [
                'id' => (int) $assetmodel->category->id,
                'name'=> e($assetmodel->category->name)
            ]  : null,
            'fieldset' => ($assetmodel->fieldset) ? [
                'id' => (int) $assetmodel->fieldset->id,
                'name'=> e($assetmodel->fieldset->name)
            ]  : null,
            'eol' => ($assetmodel->eol > 0) ? $assetmodel->eol .' months': 'None',
            'min_amt' => (int) $assetmodel->min_amt,
            'normal_amt' => (int) $assetmodel->normal_amt,
            'notes' => e($assetmodel->notes),
            'created_at' => Helper::getFormattedDateObject($assetmodel->created_at, 'datetime'),
            'updated_at' => Helper::getFormattedDateObject($assetmodel->updated_at, 'datetime'),
            'deleted_at' => Helper::getFormattedDateObject($assetmodel->deleted_at, 'datetime'),

        ];

        $permissions_array['available_actions'] = [
            'update' => (Gate::allows('update', AssetModel::class) && ($assetmodel->deleted_at==''))  ? true : false,
            'delete' => (Gate::allows('delete', AssetModel::class) && ($assetmodel->assets_count==0) && ($assetmodel->deleted_at=='')) ? true : false,
            'clone' => (Gate::allows('create', AssetModel::class) && ($assetmodel->deleted_at=='')) ,
            'restore' => (Gate::allows('create', AssetModel::class) && ($assetmodel->deleted_at!='')) ? true : false,
        ];

        $array += $permissions_array;
        return $array;
    }


    public function transformAssetModelsDatatable($assetmodels) {
        return (new DatatablesTransformer)->transformDatatables($assetmodels);
    }


}
