@extends('layout.admin')
@section('title', '文章管理')
@section('url', 'http://www.ecshop.com/admin/articles')
@section('title2', '添加文章')
@section('content')
<div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">添加文章</span>
            </div>
            <div class="widget-body" style="height: 1200px">
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
                    <form class="form-horizontal" role="form" action="/admin/articles"  method="post" enctype="multipart/form-data" id="art_form">
                        
                         <meta name="csrf-token" content="{{ csrf_token() }}">
                        {{ csrf_field() }}
                        <br>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">文章标题</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="请填写标题" name="art_title"  type="text" value="{{old('art_title')}}">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">文章描述</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="请填写概述" name="art_desc" type="text"  value="{{old('art_desc')}}">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">作者</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="请填写作者" name="art_author" type="text"  value="{{old('art_author')}}">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">外链网址</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="请填写外链url地址" name="art_url" type="text"  value="{{old('art_url')}}">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">缩略图</label>
                            <div class="col-sm-6">
                                <input placeholder="" name="art_img" type="file"  value="{{old('art_img')}}" id="file_upload">
                                <img src="/static/admin/images/onclick.jpg" style="width: 100px" alt="上传后显示图片" id="img1">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">置顶</label>
                        <div class="col-sm-10">
                            <label class="col-sm-offset-1">
                                <input type="radio" class="colored-blue" name="art_sort" checked="checked" value="1">
                                <span class="text">是</span>
                            </label>
                            <label style="margin-left: 20px;">
                                <input type="radio" class="colored-danger" name="art_sort" value="2">
                                <span class="text">否</span>
                            </label>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label no-padding-right">状态</label>
                        <div class="col-sm-10">
                            <label class="col-sm-offset-1">
                                <input type="radio" class="colored-blue" name="art_status" checked="checked" value="1">
                                <span class="text">开启</span>
                            </label>
                            <label style="margin-left: 20px;">
                                <input type="radio" class="colored-danger" name="art_status" value="2">
                                <span class="text">关闭</span>
                            </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right" name="art_content">文章内容</label>
                            <div class="col-sm-6">
                                <!-- 加载编辑器的容器 -->
                            <script id="container" name="art_content" type="text/plain" style="width: 800px;height: 500px"><p value="{{old('art_content')}}">{!!old('art_content')!!}</p>
                            </script>
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                         <!-- <p class="help-block col-sm-4 red">* 必填</p> -->
                    
                           
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">保存文章</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- 配置文件 -->
    <script type="text/javascript" src="/static/admin/udit/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/static/admin/udit/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container',{ initialFrameWidth: null , autoHeightEnabled: false});
    </script>
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
            url: "/admin/articles/profile",
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
