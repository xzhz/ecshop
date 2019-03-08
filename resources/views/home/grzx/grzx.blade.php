@extends('layout.grzx')
@section('title','个人中心');
@inject('getIp', 'App\common\getIp')
@section('grzx')
<script src="/static/home/js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="/static/home/js/iziToast.min.js" type="text/javascript"></script>
<script src="/static/home/js/demo.js" type="text/javascript"></script>
<link rel="stylesheet" href="/static/home/css/iziToast.min.css">
<link rel="stylesheet" href="/static/home/css/dem.css">
<script type="text/javascript">
    iziToast.show({
        icon: 'icon-contacts',
        title: "@if($data->jf<5000 && $data->jf>=10)尊贵的新新会员@elseif($data->jf<10000 && $data->jf>=5000)尊贵的青铜会员@elseif($data->jf<30000 && $data->jf>=10000)尊贵的白银会员 @elseif($data->jf<50000 && $data->jf>=30000)尊贵的黄金会员@elseif($data->jf<100000 && $data->jf>=50000)尊贵的钻石会员@elseif($data->jf>=100000)尊贵的铂金会员@endif{{ $data->user_name }}",
        message: ' 远方的钟声叮咛,我在晨曦清醒;手表的滴答渐明,写下的祝福语,送给你快乐满盈。',
        position: 'topCenter',
        transitionIn: 'flipInX',
        transitionOut: 'flipOutX',
        progressBarColor: 'rgb(0, 255, 184)',
        image: '/static/home/img/avatar.jpg',
        imageWidth: 70,
        layout:2,
        onClose: function(){
            console.info('onClose');
        },
        iconColor: 'rgb(0, 255, 184)'
    });
</script>
<!-- 个人中心主页显示的详细信息 开始 -->
<div class="col-md-9">
	<div class="all-pros br-ntf" style="margin-top: 0px;">
        <div class="row">
            <div class="col-md-4 col-sm-4 pl pr" style="width: 200px;">
                <div class="sngl-pro" style="margin-left: 16px;">
                    @if(empty($data->user_pic))
                    	<img src="/static/home/users_pic/default.png" alt="" width="180">
                    @else
                    	<img src="/static/{{$data->user_pic}}" alt="">
                    @endif
                </div>
            </div>
            <div class="col-md-8 col-sm-8 pl pr">
                <div class="product_content product_content_nx">
                    <div class="usal_pro">
                        <div class="product_name_2 product_name_3 prnm">
                            <h2>
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$data->user_name}}</font></font>
                                @if($data->jf<5000 && $data->jf>=10)
                                <img title="新新会员" style="margin-top: -10px;" width="40" height="40" src="/static/home/img/vip1.png">
                                @elseif($data->jf<10000 && $data->jf>=5000)
                                <img title="青铜会员" style="margin-top: -10px;" width="40" height="40" src="/static/home/img/vip2.png">
                                @elseif($data->jf<30000 && $data->jf>=10000)
                                <img title="白银会员" style="margin-top: -10px;" width="40" height="40" src="/static/home/img/vip3.png">
                                @elseif($data->jf<50000 && $data->jf>=30000)
                                <img title="黄金会员" style="margin-top: -10px;" width="40" height="40" src="/static/home/img/vip4.png">
                                @elseif($data->jf<100000 && $data->jf>=50000)
                                <img title="钻石会员" style="margin-top: -10px;" width="40" height="40" src="/static/home/img/vip5.png">
                                @elseif($data->jf>=100000)
                                <img title="铂金会员" style="margin-top: -10px;" width="40" height="40" src="/static/home/img/vip6.png">
                                @endif
                            </h2>
                            <div class="pro_discrip">
                            	<p style="vertical-align: inherit;">
                            		手机号 : {{$data->user_phone}}
                            	</p>
                            	<p style="vertical-align: inherit;">
                            		邮 箱 : @if(empty($data->user_email))
                            					<a href="/edit">立即验证</a>
                            				@else
                            					{{$data->user_email}}
                            				@endif
                            	</p>
                            	<p style="vertical-align: inherit;">
                            		上次登陆地点: {{ $getIp::getIp(session('user.user_ip')) }}
                            	</p>
                                <p style="vertical-align: inherit;">
                                    会员积分:<span title="@if($data->jf<5000 && $data->jf>=10)
                                            尊贵的新新会员
                                            @elseif($data->jf<10000 && $data->jf>=5000)
                                            尊贵的青铜会员
                                            @elseif($data->jf<30000 && $data->jf>=10000)
                                            尊贵的白银会员
                                            @elseif($data->jf<50000 && $data->jf>=30000)
                                            尊贵的黄金会员
                                            @elseif($data->jf<100000 && $data->jf>=50000)
                                            尊贵的钻石会员
                                            @elseif($data->jf>=100000)
                                            尊贵的铂金会员
                                            @endif">{{ $data->jf }}
                                        </span> 
                                </p>
                            </div>
                        </div>
                        <div class="action actionmm">
                            <div style="margin-left: 30%;margin-top: 30px;width: 300px;">
                                <div class="price_box price_box_tz" >
                                	<font style="vertical-align: inherit;">余额 :</font>
                                    <span class="spical-price"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{ $data->user_balance }}元</font></font></span>
                                
                            </div>
                            <div class="last_button_area">
                                <ul class="add-to-links clearfix">
                                    <li>
                                        <div class="new_act">
                                            <a href="/grzx/balance" class="button_act button_act_2 button_act_hts" data-quick-id="45" href="" title="" data-toggle="tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">充值</font></font></a>
                                            <a href="/coupons" class="button_act button_act_2 button_act_hts" data-quick-id="45" href="" title="" data-toggle="tooltip"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">领取优惠券</font></font></a>
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 好友动态 开始 -->
    <div class="category-widget-menu" style="margin-top: 30px;">
        <h2 class="cat-menu-title text-uppercase"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">好友动态</font></font></h2>
        <hr>
        <div class="menu-categories-container">
        	<div class="row">
        		<!-- 分为四格 开始 -->
        		<div class="col-md-4" style="padding-right: 0px;">
                	<div class="category-widget-menu" style="margin-left: 10px; margin-bottom: 10px; padding: 3px;">
                		<div class="row">
                			<div class="col-md-4" style="padding-right: 5px;">
	                            <div>
	                                <img src="holder.js/80x80" alt="">
	                            </div>
	                        </div>
	                        <div class="col-md-6" style="padding-left: 5px;">
	                        	<h4>
	                        		<font style="vertical-align: inherit;">
		                        		<font style="vertical-align: inherit;">
		                        			好友昵称
		                        		</font>
		                        	</font>
	                        	</h4>
                            	<p style="margin-bottom: 0px;margin-top: 33px;">
                            		发表时间 : 
                            	</p>
	                        </div>
                		</div>
                	</div>
                </div>
                <!-- 分为四格 结束 -->
                <!-- 其余六格 开始 -->
                <div class="col-md-8" style="padding-left: 0px;">
                	<div class="category-widget-menu" style="margin-bottom: 10px; padding: 3px; height: 88px; border-left: 0px; margin-right: 10px;">
                		<h5 style="margin-bottom: 5px;">
                			<font style="vertical-align: inherit;">
                        		<font style="vertical-align: inherit;">
                        			动态内容
                        		</font>
                        	</font>
                		</h5>
                		<div class="category-widget-menu" style="margin-bottom: 10px; padding: 3px; height: 60px; margin-right: 10px; border-bottom: 0px;">
                    		<p>13123123132</p>
                    	</div>
                	</div>
                <!-- 六格结束 -->
            	</div>
        	</div>
        </div>
        <div class="menu-categories-container">
        	<div class="row">
        		<!-- 分为四格 开始 -->
        		<div class="col-md-4" style="padding-right: 0px;">
                	<div class="category-widget-menu" style="margin-left: 10px; margin-bottom: 10px; padding: 3px;">
                		<div class="row">
                			<div class="col-md-4" style="padding-right: 5px;">
	                            <div>
	                                <img src="holder.js/80x80" alt="">
	                            </div>
	                        </div>
	                        <div class="col-md-6" style="padding-left: 5px;">
	                        	<h4>
	                        		<font style="vertical-align: inherit;">
		                        		<font style="vertical-align: inherit;">
		                        			好友昵称
		                        		</font>
		                        	</font>
	                        	</h4>
                            	<p style="margin-bottom: 0px;margin-top: 33px;">
                            		发表时间 : 
                            	</p>
	                        </div>
                		</div>
                	</div>
                </div>
                <!-- 分为四格 结束 -->
                <!-- 其余六格 开始 -->
                <div class="col-md-8" style="padding-left: 0px;">
                	<div class="category-widget-menu" style="margin-bottom: 10px; padding: 3px; height: 88px; border-left: 0px; margin-right: 10px;">
                		<h5 style="margin-bottom: 5px;">
                			<font style="vertical-align: inherit;">
                        		<font style="vertical-align: inherit;">
                        			动态内容
                        		</font>
                        	</font>
                		</h5>
                		<div class="category-widget-menu" style="margin-bottom: 10px; padding: 3px; height: 60px; margin-right: 10px; border-bottom: 0px;">
                    		<p>13123123132</p>
                    	</div>
                	</div>
                <!-- 六格结束 -->
            	</div>
        	</div>
        </div>
        <div class="menu-categories-container">
        	<div class="row">
        		<!-- 分为四格 开始 -->
        		<div class="col-md-4" style="padding-right: 0px;">
                	<div class="category-widget-menu" style="margin-left: 10px; margin-bottom: 10px; padding: 3px;">
                		<div class="row">
                			<div class="col-md-4" style="padding-right: 5px;">
	                            <div>
	                                <img src="holder.js/80x80" alt="">
	                            </div>
	                        </div>
	                        <div class="col-md-6" style="padding-left: 5px;">
	                        	<h4>
	                        		<font style="vertical-align: inherit;">
		                        		<font style="vertical-align: inherit;">
		                        			好友昵称
		                        		</font>
		                        	</font>
	                        	</h4>
                            	<p style="margin-bottom: 0px;margin-top: 33px;">
                            		发表时间 : 
                            	</p>
	                        </div>
                		</div>
                	</div>
                </div>
                <!-- 分为四格 结束 -->
                <!-- 其余六格 开始 -->
                <div class="col-md-8" style="padding-left: 0px;">
                	<div class="category-widget-menu" style="margin-bottom: 10px; padding: 3px; height: 88px; border-left: 0px; margin-right: 10px;">
                		<h5 style="margin-bottom: 5px;">
                			<font style="vertical-align: inherit;">
                        		<font style="vertical-align: inherit;">
                        			动态内容
                        		</font>
                        	</font>
                		</h5>
                		<div class="category-widget-menu" style="margin-bottom: 10px; padding: 3px; height: 60px; margin-right: 10px; border-bottom: 0px;">
                    		<p>13123123132</p>
                    	</div>
                	</div>
                <!-- 六格结束 -->
            	</div>
        	</div>
        </div>
        <div class="menu-categories-container">
        	<div class="row">
        		<!-- 分为四格 开始 -->
        		<div class="col-md-4" style="padding-right: 0px;">
                	<div class="category-widget-menu" style="margin-left: 10px; margin-bottom: 10px; padding: 3px;">
                		<div class="row">
                			<div class="col-md-4" style="padding-right: 5px;">
	                            <div>
	                                <img src="holder.js/80x80" alt="">
	                            </div>
	                        </div>
	                        <div class="col-md-6" style="padding-left: 5px;">
	                        	<h4>
	                        		<font style="vertical-align: inherit;">
		                        		<font style="vertical-align: inherit;">
		                        			好友昵称
		                        		</font>
		                        	</font>
	                        	</h4>
                            	<p style="margin-bottom: 0px;margin-top: 33px;">
                            		发表时间 : 
                            	</p>
	                        </div>
                		</div>
                	</div>
                </div>
                <!-- 分为四格 结束 -->
                <!-- 其余六格 开始 -->
                <div class="col-md-8" style="padding-left: 0px;">
                	<div class="category-widget-menu" style="margin-bottom: 10px; padding: 3px; height: 88px; border-left: 0px; margin-right: 10px;">
                		<h5 style="margin-bottom: 5px;">
                			<font style="vertical-align: inherit;">
                        		<font style="vertical-align: inherit;">
                        			动态内容
                        		</font>
                        	</font>
                		</h5>
                		<div class="category-widget-menu" style="margin-bottom: 10px; padding: 3px; height: 60px; margin-right: 10px; border-bottom: 0px;">
                    		<p>13123123132</p>
                    	</div>
                	</div>
                <!-- 六格结束 -->
            	</div>
        	</div>
        </div>
        <div class="menu-categories-container">
        	<div class="row">
        		<!-- 分为四格 开始 -->
        		<div class="col-md-4" style="padding-right: 0px;">
                	<div class="category-widget-menu" style="margin-left: 10px; margin-bottom: 10px; padding: 3px;">
                		<div class="row">
                			<div class="col-md-4" style="padding-right: 5px;">
	                            <div>
	                                <img src="holder.js/80x80" alt="">
	                            </div>
	                        </div>
	                        <div class="col-md-6" style="padding-left: 5px;">
	                        	<h4>
	                        		<font style="vertical-align: inherit;">
		                        		<font style="vertical-align: inherit;">
		                        			好友昵称
		                        		</font>
		                        	</font>
	                        	</h4>
                            	<p style="margin-bottom: 0px;margin-top: 33px;">
                            		发表时间 : 
                            	</p>
	                        </div>
                		</div>
                	</div>
                </div>
                <!-- 分为四格 结束 -->
                <!-- 其余六格 开始 -->
                <div class="col-md-8" style="padding-left: 0px;">
                	<div class="category-widget-menu" style="margin-bottom: 10px; padding: 3px; height: 88px; border-left: 0px; margin-right: 10px;">
                		<h5 style="margin-bottom: 5px;">
                			<font style="vertical-align: inherit;">
                        		<font style="vertical-align: inherit;">
                        			动态内容
                        		</font>
                        	</font>
                		</h5>
                		<div class="category-widget-menu" style="margin-bottom: 10px; padding: 3px; height: 60px; margin-right: 10px; border-bottom: 0px;">
                    		<p>13123123132</p>
                    	</div>
                	</div>
                <!-- 六格结束 -->
            	</div>
        	</div>
        </div>
    </div>
	<!-- 好友动态 结束 -->
</div>
<!-- 个人中心主页显示的详细信息 结束 -->
@endsection