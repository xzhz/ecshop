@extends('layout.admin')
@section('title', '轮播图管理')
@section('url', 'http://www.ecshop.com/admin/lunbo/index')
@section('title2', '修改轮播图')
@section('content')
<div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">修改轮播图</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">

                    @if (count($errors) > 0)
                        <div class="alert alert-warning fade in">
                            <ul>
                                <button class="close" data-dismiss="alert">
                                ×
                                </button>
                                    @foreach ($errors->all() as $error)
                                        <i class="fa-fw fa fa-warning"></i>
                                            <strong>Warning</strong> {{ $error }}
                                         <br>
                                    @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" action="/admin/lunbo/{{$data->id}}"  method="post" enctype="multipart/form-data"  id="art_form">
                        <meta name="csrf-token" content="{{ csrf_token() }}">  
                       {{ csrf_field() }}
                       {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">轮播图名称</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="" name="lunbo_name"  type="text" value="{{$data->lunbo_name}}">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">轮播图描述</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="" name="lunbo_desc" type="text"  value="{{$data->lunbo_desc}}">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>


                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">链接网址</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="" name="lunbo_link" type="text"  value="{{$data->lunbo_link}}">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                          <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">轮播图</label>
                            <div class="col-sm-6">
                                <input placeholder="" name="lunbo_img" type="file" value=""
                                id="file_upload"><br>
                                <img src="{{'/static/admin/images/lunbo/'.$data->lunbo_img}}" width="100px" height="50px" id="img1">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                       
                        <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">链接状态</label>
                        <div class="col-sm-10">
   
                            <label class="col-sm-offset-1">
                                <input type="radio" class="colored-blue" name="lunbo_status" value="1" @if($data->lunbo_status=='1') checked="checked" @endif>
                                <span class="text"> 显示</span>
                            </label>
                            <label style="margin-left: 20px;">
                                <input type="radio" class="colored-danger" name="lunbo_status" value="2" @if($data->lunbo_status=='2') checked="checked" @endif>
                                <span class="text"> 关闭</span>
                            </label>
                        </div>
                            
                            
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">确认修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(function () {
        $("#file_upload").change(function () {
            uploadImage();
        })
    })

    function uploadImage() {
//  判断是否有选择上传文件
        var imgPath = $("#file_upload").val();

        if (imgPath == "") {
            alert("请选择上传图片！");
            return;
        }
        //判断上传文件的后缀名
        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
        if (strExtension != 'jpg' && strExtension != 'gif'
            && strExtension != 'png' && strExtension != 'jpeg') {
            alert("请选择正确的图片类型文件");
            return;
        }

        var formData = new FormData($('#art_form')[0]);
        $.ajax({
            type: "POST",
            url: "/admin/lunbo/profile",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                //console.log(data);
                $('#img1').attr('src',data);
                //$('#art_thumb').val(data);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }

</script>
@endsection