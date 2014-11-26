<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title><?php echo C('WEB_NAME');?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="ThinkPHP管理系统,基于ThinkPHP的CRM," />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Public/acestyle/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Public/acestyle/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/Public/acestyle/css/font-awesome.min.css" />
    <!--[if IE 7]>
    <link rel="stylesheet" href="/Public/acestyle/css/font-awesome-ie7.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="/Public/acestyle/css/colorbox.css" />
    <link rel="stylesheet" href="/Public/acestyle/css/datepicker.css" />
    <link rel="stylesheet" href="/Public/acestyle/css/ui.jqgrid.css" />
    <link rel="stylesheet" href="/Public/acestyle/css/ace.min.css" />
    <style type="text/css">
        #sample-table-2 tbody td{
            line-height: 60px;
        }

    </style>


</head>
<body>
<!--#################包含头部的导航文件#############-->
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="icon-leaf"></i>
                            下单系统管理后台
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-tasks"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-ok"></i>
									还有4个任务完成
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">软件更新</span>
											<span class="pull-right">65%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:65%" class="progress-bar "></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">硬件更新</span>
											<span class="pull-right">35%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:35%" class="progress-bar progress-bar-danger"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">单元测试</span>
											<span class="pull-right">15%</span>
										</div>

										<div class="progress progress-mini ">
											<div style="width:15%" class="progress-bar progress-bar-warning"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">错误修复</span>
											<span class="pull-right">90%</span>
										</div>

										<div class="progress progress-mini progress-striped active">
											<div style="width:90%" class="progress-bar progress-bar-success"></div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										查看任务详情
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>

							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-warning-sign"></i>
									8条通知
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
												新闻评论
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-xs btn-primary icon-user"></i>
										切换为编辑登录..
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
												新订单
											</span>
											<span class="pull-right badge badge-success">+8</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-info icon-twitter"></i>
												粉丝
											</span>
											<span class="pull-right badge badge-info">+11</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										查看所有通知
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">5</span>
							</a>

							<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="icon-envelope-alt"></i>
									5条消息
								</li>

								<li>
									<a href="#">
										<img src="/Public/acestyle/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Alex:</span>
												不知道写啥 ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>1分钟以前</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="/Public/acestyle/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Susan:</span>
												不知道翻译...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>20分钟以前</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="/Public/acestyle/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
										<span class="msg-body">
											<span class="msg-title">
												<span class="blue">Bob:</span>
												到底是不是英文 ...
											</span>

											<span class="msg-time">
												<i class="icon-time"></i>
												<span>下午3:15</span>
											</span>
										</span>
									</a>
								</li>

								<li>
									<a href="inbox.html">
										查看所有消息
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo session('userpic');?>" alt="" />
								<span class="user-info">
									<small>欢迎光临,</small>
									<?php echo session('nickname');?>(<?php echo session('department');?>)
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="icon-cog"></i>
										设置
									</a>
								</li>

								<li>
									<a href="#">
										<i class="icon-user"></i>
										个人资料
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo U('Login/logout');?>">
										<i class="icon-off"></i>
										退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

<div class="main-container" id="main-container" openval="1">
<script type="text/javascript">
    try{ace.settings.check('main-container' , 'fixed')}catch(e){}
</script>

<div class="main-container-inner">
    <a class="menu-toggler" id="menu-toggler" href="#">
        <span class="menu-text"></span>
    </a>
    <!--###############包含左侧公共菜单文件###############-->
    
				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list" id="leftmenu">
						<li class="active">
							<a href="<?php echo U('Index/index');?>">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> 控制台 </span>
							</a>
						</li>
						<li style="<?php if(session('department')!='销售部') echo "display:none;";?>">
							<a href="#" class="dropdown-toggle">
								<i class="icon-file"></i>
								<span class="menu-text"> 订单管理（销售部） </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo U('Order/index',array('num'=>1));?>">
										<i class="icon-double-angle-right"></i>
										添加客户订单
									</a>
								</li>

                                <!--<li>
                                    <a href="<?php echo U('Order/design',array('num'=>1));?>">
                                        <i class="icon-double-angle-right"></i>
                                        添加订单要求
                                    </a>
                                </li>-->

								<li>
									<a href="<?php echo U('Order/listorder',array('num'=>1));?>">
										<i class="icon-double-angle-right"></i>
										我的客户订单
									</a>
								</li>

							</ul>
						</li>
                        <li style="<?php if(session('department')!='设计部') echo "display:none;";?>">
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-file"></i>
                                <span class="menu-text"> 订单管理（设计部） </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?php echo U('Art/index',array('num'=>2));?>">
                                        <i class="icon-double-angle-right"></i>
                                        可接订单
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo U('Art/myorder',array('num'=>2));?>">
                                        <i class="icon-double-angle-right"></i>
                                        正在进行的订单
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo U('Art/complete',array('num'=>2));?>">
                                        <i class="icon-double-angle-right"></i>
                                        已完成的订单
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li style="<?php if(session('department')!='采购部') echo "display:none;";?>">
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-desktop"></i>
                                <span class="menu-text"> 订单审核（采购部） </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?php echo U('Buy/index',array('num'=>3));?>">
                                        <i class="icon-double-angle-right"></i>
                                        待审核订单
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo U('Buy/complete',array('num'=>3));?>">
                                        <i class="icon-double-angle-right"></i>
                                        已审核订单
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li style="<?php if(session('department')!='供应商') echo "display:none;";?>">
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-desktop"></i>
                                <span class="menu-text"> 订单确认（供应商） </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?php echo U('Support/index',array('num'=>4));?>">
                                        <i class="icon-double-angle-right"></i>
                                        待确认订单
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo U('Support/complete',array('num'=>4));?>">
                                        <i class="icon-double-angle-right"></i>
                                        已确认订单
                                    </a>
                                </li>

                            </ul>
                        </li>

						<li>
							<a href="#" class="dropdown-toggle">
								<i class="icon-cog"></i>
								<span class="menu-text"> 系统设置 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li>
									<a href="<?php echo U('System/edit',array('num'=>5));?>">
										<i class="icon-double-angle-right"></i>
                                        修改密码
									</a>
								</li>


							</ul>
						</li>

                        <li>
                            <a href="<?php echo U('Index/calendar',array('num'=>6));?>">
                                <i class="icon-calendar"></i>

								<span class="menu-text">
									日历
									<span class="badge badge-transparent tooltip-error" title="2&nbsp;Important&nbsp;Events">
										<i class="icon-warning-sign red bigger-130"></i>
									</span>
								</span>
                            </a>
                        </li>




					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>

            <ul class="breadcrumb">
                <li>
                    <i class="icon-home home-icon"></i>
                    <a href="#">首页</a>
                </li>
                <li class="active">控制台</li>
            </ul><!-- .breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                            <span class="input-icon">
                                <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                                <i class="icon-search nav-search-icon"></i>
                            </span>
                </form>

            </div><!-- #nav-search -->
        </div>

        <div class="page-content">
            <div class="page-header">
                <h1>
                    控制台
                    <small>
                        <i class="icon-double-angle-right"></i>
                        已完成的订单
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="table-header">
                        已经完成的订单
                    </div>
                    <table class="table table-striped table-bordered table-hover dataTable" id="sample-table-2" aria-describedby="sample-table-2_info">
                        <thead>
                        <td>id</td>
                        <td>订单名称</td>
                        <td>下单人姓名</td>
                        <td>订单进度</td>
                        <td>下单时间</td>
                        <td>设计时间</td>
                        <td>查看订单详情</td>
                        <td>设计效果图</td>
                        <td>状态</td>
                        </thead>


                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                                <td><?php echo ($v["id"]); ?></td>
                                <td><?php echo ($v["ordername"]); ?></td>
                                <td><?php echo ($v["salesname"]); ?></td>
                                <td style="line-height: 30px;"><?php echo ($v["process"]); ?></td>
                                <td><?php echo (date('Y-m-d',$v["createtime"])); ?></td>
                                <td><?php echo (date('Y-m-d',$v["deliverytime"])); ?></td>
                                <td><?php echo ($v["seemore"]); ?></td>
                                <td><?php echo ($v["img"]); ?></td>
                                <td><?php echo ($v["result"]); ?></td>
                            </tr><?php endforeach; endif; ?>

                        </tbody>
                    </table>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->
<!--[if !IE]> -->
<script src="http://libs.baidu.com/jquery/2.0.3/jquery.min.js"></script>
<!-- <![endif]-->
<!--[if IE]>
<![endif]-->
<!--############################bootstrap组要的js##############-->
<script src="/Public/acestyle/js/bootstrap.min.js"></script>
<!--##################对话框的函数###################-->
<script src="/Public/acestyle/js/bootbox.min.js"></script>
<script src="/Public/acestyle/js/jquery.easy-pie-chart.min.js"></script>
<script src="/Public/acestyle/js/jquery.gritter.min.js"></script>
<!--##################对话框的函数###################-->
<script src="/Public/acestyle/js/jquery.colorbox-min.js"></script>
<!--############引入jqgrid需要的插件##########################-->
<script src="/Public/acestyle/js/date-time/bootstrap-datepicker.min.js"></script>

<!-- ace scripts -->
<script src="/Public/acestyle/js/ace.min.js"></script>


<!-- inline scripts related to this page -->
<script type="text/javascript">
//自定义弹出对话框
function showmsg(msg,id) {
    bootbox.confirm(msg, function(result) {
        if(result) {
            submitOrder(id);
            //calbak;
        }
    });
}

jQuery(function($) {
    var menunum="<?php echo ($menunum); ?>";
    $('#leftmenu').children().eq(menunum).addClass('open');
    $('#leftmenu').children().eq(menunum).children('.submenu').show();
})

jQuery(function($) {
    var oTable1 = $('#sample-table-2').dataTable( {
        "aoColumns": [
            { "bSortable": false },
            null, null,null, null, null,
            { "bSortable": false }
        ] } );


    $('table th input:checkbox').on('click' , function(){
        var that = this;
        $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function(){
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });

    });


    $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
    function tooltip_placement(context, source) {
        var $source = $(source);
        var $parent = $source.closest('table')
        var off1 = $parent.offset();
        var w1 = $parent.width();

        var off2 = $source.offset();
        var w2 = $source.width();

        if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
        return 'left';
    }
})
function golist(url){
    window.location.href=url;

}
</script>

</body>
</html>