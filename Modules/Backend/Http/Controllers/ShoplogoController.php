<?php namespace Modules\Backend\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Support\Facades\Input;
use Shop_logo;
use Shop_category;
use Shop_config;
use Uploader;

class ShopLogoController extends Controller {

    protected $shop;
    protected $category;
    public function __construct(Shop_logo $shop, Shop_category $category)
    {
        $this->shop = $shop;
        $this->category = $category;
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getIndex()
    {
        $status = Input::get('type');
        $shops = $this->shop->select('id', 'title','category_id','thumb','user_id','price','comments','hits','created_at','updated_at')->where('status','=',$status)->with(array('images' => function($query)
        {
            $query->select('id', 'path');
        }))->paginate(15);
        foreach ($shops as $k=>$v) {
            $shops[$k]['category'] = $this->category->find($v->category_id)->name;
            $shops[$k]['user'] = Sentry::findUserById($v->user_id)->username;
        }
        return Response::json($shops);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEdit($id)
    {
        $data = $this->shop->find($id);
        $data->tags = $data->tagNames();
        //trading 
        $trade_options = explode(',',$data['trading']);
        foreach($trade_options as $ks=>$vs){
            $trades = explode(':',$vs);
            $trade[$trades[0]] = $trades[1];
        }
        if($data->thumb > 0){
            $thumb = Uploader::where('id',$data->thumb)->select(['id','name','path'])->first();
            $data->thumb = $thumb?$thumb:'';
        }
        $data['trading'] = $trade;
        return Response::json($data);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function postStore()
    {
        $data = Input::all();
        $tags = Input::get('tags');
        
        $str = '';
        foreach ($data['trading'] as $key => $value) {
            $str .= empty($str) ? $key.':'.$value : ','.$key.':'.$value;
        }
        $data['trading'] = $str;
        $data['user_id'] = Sentry::getUser()->id;
        $data['tags'] = implode(',', $tags);
        $data['num'] = 1;
        $data['status'] = 1;
        $shop = $this->shop->create($data);

        //tag处理
        if(count($tags) > 0){
            $shop->tag($tags);
        }

        return Response::json(['status'=>$shop?1:0]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function putUpdate($id)
    {
        $shop = $this->shop->find($id);

        $data = Input::all();
        $tags = Input::get('tags');
        $str = '';
        foreach ($data['trading'] as $key => $value) {
            $str .= empty($str) ? $key.':'.$value : ','.$key.':'.$value;
        }
        $data['trading'] = $str;
        $data['user_id'] = Sentry::getUser()->id;
        $data['tags'] = implode(',', $tags);
        $data['num'] = 1;
        $data['status'] = 1;

        $shop->fill($data);
        //tag处理
        
        if(count($tags) > 0){
            $shop->retag($tags);
        }
        return Response::json(['status'=>$shop->save()?1:0]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDestroy($id)
    {
        $shop = $this->shop->find($id);
        return Response::json(['status'=>$shop->delete()?1:0]);
    }

    public function getAttr()
    {
        return Response::json($this->shop->getAttr('商标'));
    }


    /**
     * 审核
     *===========================================================================================
     */

    /**
     * @param $id
     * @param $type   val of status
     * @return \Illuminate\Http\JsonResponse
     */
    public function getChangeStatus($id)
    {
        $status = Input::get('type');
        $shop = $this->shop->find($id);
        $shop->status = $status;

        return Response::json(['status'=>$shop->save()?1:0]);
    }

    /**
     * 设置
     *===========================================================================================
     */
    
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSetAttr()
    {
        $config = new Shop_config;
        return Response::json($config->getAttr(1));
    }

    public function getSetValue()
    {
        $config = new Shop_config;
        $data = $config->where('model','=','logo')->get();
        foreach ($data as $key => $value) {
            $arr[$value['name']] = $value['value'];
        }
        return Response::json($arr);
    }

    public function postSet()
    {
        
        $config = new Shop_config;
        $data = Input::all();
        //删除之前的设置，然后新增
        $config->where('model', '=', 'logo')->delete();
        foreach ($data as $k => $v) {
            $val['model'] = 'logo';
            $val['name'] = $k;
            $val['value'] = $v;
            $set = $config->create($val);
        }
        return Response::json(['status'=>$set?1:0]);
    }

    /**
     * 栏目管理
     *===========================================================================================
     */
    public function getAllCate()
    {
        $pid = $this->getCategoryPid();
        $categories = $this->category->where('pid','=',$pid)->get();
        return Response::json($categories);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getChildCate($id)
    {
        $categories = $this->category->where('pid','=',$id)->get();
        return Response::json($categories);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEditCate($id)
    {
        $data = $this->category->find($id);
        if($data->thumb > 0){
            $thumb = Uploader::where('id',$data->thumb)->select(['id','name','path'])->first();
            $data->thumb = $thumb?$thumb:'';
        } 
        return Response::json($data);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function postStoreCate()
    {
        $data = Input::all();
        
        $category = $this->category->create($data);
        return Response::json(['status'=>$category?1:0]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function putUpdateCate($id)
    {
        $category = $this->category->find($id);
        $data = Input::all();
        $category->fill($data);
        
        return Response::json(['status'=>$category->save()?1:0]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDestroyCate($id)
    {
        $category = $this->category->find($id);
        return Response::json(['status'=>$category->delete()?1:0]);
    }

    public function getAttrCate()
    {
        $pid = $this->getCategoryPid();
        return Response::json($this->category->getAttr($pid));
    }

    protected function getCategoryPid(){
        return 1;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function postChangeCate()
    {
        $actions = Input::get('actions');
        $ids = Input::get('idss');
        
        switch($actions){
            case 1:     //删除
                $res = $this->category->whereIn('pid', $ids)->delete();
                $res = $this->category->whereIn('id', $ids)->delete();
                break;
            case 2:     //推荐
                $data['level'] = 1;
                break;
            case 3:     //不推荐
                $data['level'] = 0;
                break;
            case 4:     //显示
                $data['status'] = 1;
                break;
            case 5:     //不显示
                $data['status'] = 0;
                break;
            default: $data['level'] = 2;
        }
        if($actions != 1){
            foreach ($ids as $key => $value) {
                /*$category = $this->category->find($value);
                $category->fill($data);
                $res = $category->save();*/
                $res = $this->category->where('id', '=', $value) ->update($data);
            }
        }
        if($res){
            $status = 1;
            $pid = $this->getCategoryPid();
            $categories = $this->category->where('pid','=',$pid)->get();
        }else{
            $status = 0;
            $categories = '';
        }
        return Response::json(['status'=>$status, 'data'=>$categories]);
    }
}