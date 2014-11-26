<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>  
    <title>添加订单要求</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="ThinkPHP管理系统,基于ThinkPHP的CRM," />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Public/acestyle/css/bootstrap.min.css"  />
    <link rel="stylesheet" href="/Public/acestyle/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/Public/acestyle/css/chosen.css" />
    <link rel="stylesheet" href="/Public/acestyle/css/datepicker.css" />
    <link rel="stylesheet" href="/Public/acestyle/css/daterangepicker.css" />
    <link rel="stylesheet" href="/Public/acestyle/css/ace.min.css" />
    <link rel="stylesheet" href="/Public/acestyle/css/ace-rtl.min.css" />
    <style type="text/css">
        .ace-file-input{
            width: 42%;
        }
        input.ace.ace-switch[type="checkbox"]:checked + .lbl:before {
            text-indent: 5px;
        }
        input.ace.ace-switch[type="checkbox"] + .lbl:before {
            width: 60px;
            height: 26px;
            text-indent: -8px;
            padding-left: -6px;
            font-family: "宋体";
            font-size: 12px;
            line-height: 24px;
            content: "开启               关闭";
        }
        input.ace.ace-switch[type="checkbox"] + .lbl:after {
            content: ""|||"";
            height: 26px;
            width: 26px;
            line-height: 26px;
            margin-top: 1px;
        }
        .modal-dialog{
            margin: 10% auto;
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

    <div class="main-container" id="main-container" openval="3">
        <script type="text/javascript">
            try{ace.settings.check('main-container' , 'fixed')}catch(e){}
        </script>

        <div class="main-container-inner">
            <a class="menu-toggler" id="menu-toggler" href="#">
                class="menu-text"></span>
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
                                 添加订单要求
                            </small>
                        </h1>
                    </div><!-- /.page-header -->

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                                <form class="form-horizontal" id="adduserform" role="form" method="post" enctype="multipart/form-data">
                                    <!--<div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 所属订单 </label>

                                        <div class="col-sm-9">
                                            <select name="ordername" class="form-control" style="width:41.6666%;">
                                                <?php if(is_array($rowOrder)): foreach($rowOrder as $key=>$v): ?><option value="<?php echo ($v["ordername"]); ?>"><?php echo ($v["ordername"]); ?></option><?php endforeach; endif; ?>
                                            </select>

                                        </div>
                                    </div>-->

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 款式名称<span style="color: red;">(*)</span> </label>

                                        <div class="col-sm-9">
                                            <input type="hidden" name="oid" value="<?=$oid?>">
                                            <input type="text" name="style"  placeholder="款式名称" class="col-xs-10 col-sm-5" />
                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 款式数量<span style="color: red;">(*)</span> </label>

                                        <div class="col-sm-9">
                                            <input type="text" name="numbers" placeholder="款式数量" class="col-xs-10 col-sm-5" />
                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 印刷要求 </label>

                                        <div class="col-sm-9">
                                            <textarea placeholder="印刷要求"  name="require" class="col-xs-10 col-sm-5"></textarea>
                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 发货方式<span style="color: red;">(*)</span> </label>

                                        <div class="col-sm-9">
                                            <input type="text" name="sendMethond" placeholder="发货方式" class="col-xs-10 col-sm-5" />
                                        </div>
                                    </div>

                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 交货日期<span style="color: red;">(*)</span> </label>

                                        <div class="col-sm-9">
                                            <input type="text" data-date-format="yyyy-mm-dd" name="deliveryTime" class="col-xs-10 col-sm-4 date-picker">
                                            <span class="input-group-addon" style="width: 80%; margin-left: -20px;">
                                                <i class="icon-calendar small-10"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 设计时间<span style="color: red;">(*)</span> </label>

                                        <div class="col-sm-9">
                                            <input type="text" data-date-format="yyyy-mm-dd" name="designTime" class="col-xs-10 col-sm-4 date-picker">
                                            <span class="input-group-addon" style="width: 80%; margin-left: -20px;">
                                                <i class="icon-calendar small-10"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 备注<span style="color: red;">(*)</span> </label>

                                        <div class="col-sm-9">
                                            <textarea placeholder="备注"  name="remarks" class="col-xs-10 col-sm-5"></textarea>
                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">

                                        <div class="col-sm-7">
                                            <label class="col-sm-5 control-label no-padding-center">  </label>
                                            <button type="reset" class="pull-center btn btn-sm btn-reset">
                                                <i class="icon-refresh"></i>
                                                重置
                                            </button>
                                            <button type="submit" id="addsubmit" class="pull-right btn btn-sm btn-success">
                                                添加
                                                <i class="icon-ok icon-on-right bigger-110"></i>
                                            </button>
                                        </div>
                                    </div>
                                                
                                    <div class="space-4"></div>
                                </form>
                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </div><!-- /.main-content -->
    </div><!-- /.main-container -->

    <!--[if !IE]> -->
    <script src="http://libs.baidu.com/jquery/2.0.3/jquery.min.js"></script>
    <!-- <![endif]-->
    <!--[if IE]>
    <script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
    <![endif]-->
    <script src="/Public/acestyle/js/bootstrap.min.js"></script>
    <!--##################对话框的函数###################-->
    <script src="/Public/acestyle/js/bootbox.min.js"></script>
    <script src="/Public/acestyle/js/jquery.easy-pie-chart.min.js"></script>
    <script src="/Public/acestyle/js/jquery.gritter.min.js"></script>
    <!--##################对话框的函数###################-->
    <script src="/Public/acestyle/js/date-time/bootstrap-datepicker.min.js"></script>
    <script src="/Public/acestyle/js/date-time/daterangepicker.min.js"></script>
    <script src="/Public/acestyle/js/ace-elements.min.js"></script>
    <script src="/Public/acestyle/js/ace.min.js"></script>
    <script src="/Public/acestyle/js/jquery.form.js"></script>
    <script type="text/javascript">
        var forbid = 0;
        jQuery(function($) {
                var menunum="<?php echo ($menunum); ?>";
                $('#leftmenu').children().eq(menunum).addClass('open');
                $('#leftmenu').children().eq(menunum).children('.submenu').show();
                $('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });
                function myshowmsg(msg,url) {
                    bootbox.dialog({
                        message: "<span class='bigger-110'>"+msg+"</span>",
                        buttons:
                        {
                            "danger" :
                            {
                                "label" : "查看列表",
                                "className" : "btn-sm btn-danger",
                                "callback": function() {                                    
                                        window.location.href="<?php echo U('Order/listorder',array('num'=>1));?>";                                   
                                }
                            },
                            "success" :
                            {
                                "label" : "继续添加",
                                "className" : "btn-sm btn-success",
                                "callback": function() {
                                    $('#adduserform').resetForm();
                                }
                            }
                         }

                    })
                }
                 /*

                 bootbox.confirm(msg, function(result) {
                 if (result) {
                 //Example.show("Prompt dismissed");
                 }
                 });
                    */
                //ajax提交表单
                $('#addsubmit').click(function(){
                    //$('button').attr('disabled','disabled');
                    var style = $("input[name='style']").val();
                    var numbers = $("input[name='numbers']").val();
                    var require = $("input[name='require']").val();
                    var sendMethond = $("input[name='sendMethond']").val();
                    var deliveryTime = $("input[name='deliveryTime']").val();
                    var designTime = $("input[name='designTime']").val();

                    var options = { 
                        //target:        '#output1',   // target element(s) to be updated with server response 
                        beforeSubmit:  showRequest,  // pre-submit callback 
                        success: showResponse, // post-submit callback               
                        // other available options: 
                        url:"<?php echo U('Order/adddesignhandle');?>",   // override for form's 'action' attribute
                        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
                        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
                        //clearForm: true        // clear all form fields after successful submit 
                        //resetForm: true        // reset the form after successful submit 
                 
                        // $.ajax options can be used here too, for example: 
                        timeout:   3000 
                    }; 
        
                    // bind form using 'ajaxForm'
                    $('#adduserform').ajaxForm(options); 
                    /*if(forbid==0){
                        $('#adduserform').ajaxForm(options); 
                        forbid = 1;
                    }else{
                        alert('表单已经提交，请勿重复提交');
                        return false;
                    }*/
                    
                    function showResponse(data) {
                        var data = eval('(' + data + ')');
                        if(data.status){
                            //$('#adduserform')[0].reset()
                            //location.reload();
                            var url="<?php echo U('Order/listorder',array('num'=>1));?>";
                            myshowmsg(data.msg,url);
                            $('#adduserform').resetForm();
                        }else{
                           //alert(data.msg);
                           myshowmsg(data.msg);
                           $("#ordername").focus();
                           //window.location.href="<?php echo U('User/edit');?>";
                           return false;
                        }
                        
                    }
                    function showRequest() {
                        if(style==''||numbers==''||require==''||sendMethond==''||deliveryTime==''||designTime==''){
                            var msg = '请填将信息填写完整,带*的为必填项';
                            myshowmsg(msg);
//                            $("input[name='ordername']").focus();
                            return false;
                        }
                        return true;
                    }
                })

            });
            
        </script>

</body>
</html>