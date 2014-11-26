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
        .ui-jqgrid .ui-jqgrid-hbox {
            padding: 0;
            width: 100%;
        }
        .ui-jqgrid .ui-jqgrid-htable {
            width: 100% !important;
        }
        .ui-jqgrid #grid-table{
            width: 100% !important;
        }
        #gview_grid-table .btn{
            padding:0 12px;
        }
        #gview_grid-table .submitOrder{
            padding:0 19px;
        }
        .modal-dialog {
            padding-top: 10%;
        }
        .ace-thumbnails{
            float: left;
            padding: 1px;
            margin-left: 10px;
            cursor: pointer;
        }
        .ui-jqgrid tr.ui-row-ltr td, .ui-jqgrid tr.ui-row-rtl td {
            padding: 0;
            text-align: center;
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
                        正在进行的订单
                    </small>
                </h1>
            </div><!-- /.page-header -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <table id="grid-table"></table>

                    <div id="grid-pager"></div>

                    <script type="text/javascript">
                        var $path_base = "/";//this will be used in gritter alerts containing images
                    </script>

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
<script src="/Public/acestyle/js/jqGrid/jquery.jqGrid.min.js"></script>
<script src="/Public/acestyle/js/jqGrid/i18n/grid.locale-cn.js"></script>


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
//自定义删除对话框
function showdelmsg(msg,url) {
    bootbox.confirm(msg, function(result) {
        if(result) {
            window.location.href=url;
            //calbak;
        }
    });
}

jQuery(function($) {
    var menunum="<?php echo ($menunum); ?>";
    $('#leftmenu').children().eq(menunum).addClass('open');
    $('#leftmenu').children().eq(menunum).children('.submenu').show();

    var grid_selector = "#grid-table";
    var pager_selector = "#grid-pager";
    jQuery(grid_selector).jqGrid({
        //direction: "rtl",
        //data: grid_data,
        url:"<?php echo U('Art/myorderHandel');?>",  //请求数据的url地址
        height:500,
        datatype: "json",  //请求的数据类型
        colNames:['ID','订单名称','订单进度','下单时间','设计时间','查看订单详情','是否签合同','设计效果图(点击放大)','提交订单'],
        colModel:[
            {name:'id',index:'id', width:10,editable:false,align:'center'},
            {name:'ordername',index:'ordername', width:30,editable:true,align:'center'},
            //{name:'salesname', width:30,editable:true,align:'center'},
            {name:'process', width:60,editable:true,align:'center'},
            //{name:'tel', width:30,editable:true,align:'center'},
            {name:'createtime', width:25,editable:true,align:'center',unformat: pickDate},
            {name:'designtime', width:25,editable:true,align:'center',unformat: pickDate},
            {name:'design', width:40,editable:false,align:'center'},
            {name:'agreement', width:25, sortable:true,editable: false,edittype:"checkbox",editoptions: {value:"已签订:未签订"},unformat: aceSwitch},
            {name:'pics', width:150,editable:false,align:'center'},
            {name:'submit', width:30,editable:false,align:'center'},
        ],
        //toolbar:[true,"top"],
        prmNames: {search: "search"}, //自定义查询的标志名称
        viewrecords : true,
        rowNum:10,
        rowList:[10,20,30],
        pager : pager_selector,
        //altRows: true,
        //gridview:true, //加速显示
        editurl:"<?php echo U('Order/listHandel');?>", //编辑表格的url地址
        //toppager: true,
        sortname:"id",
        //multiselect: true,//id前+多选
        //multikey: "ctrlKey",
        //multiboxonly: true,

        loadComplete : function(data) {
            var table = this;
            setTimeout(function(){
                styleCheckbox(table);
                updateActionIcons(table);
                updatePagerIcons(table);
                enableTooltips(table);
            }, 0);
            if(data.status==0){
                //$("p").appendTo($("#grid-table")).addClass("norecords").html('找不到相关数据！');
                $("#grid-table").parent().append("<div class=\"norecords\">没有符合数据</div>");
                $(".norecords").show();
                //info_dialog("修改","选择要修改的数据","确定");
            }

        },

        //editurl: $path_base+"/dummy.html",//nothing is saved
        caption: "笔秀下单系统---正在进行的订单",

        autowidth: true

    });
    //enable search/filter toolbar
    //jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})

    //switch element when editing inline
    function aceSwitch( cellvalue, options, cell ) {
        setTimeout(function(){
            $(cell) .find('input[type=checkbox]')
                    .wrap('<label class="inline" />')
                    .addClass('ace ace-switch ace-switch-6')
                    .after('<span class="lbl"></span>');
        }, 0);
    }
    //enable datepicker
    function pickDate( cellvalue, options, cell ) {
        setTimeout(function(){
            $(cell) .find('input[type=text]')
                    .datepicker({format:'yyyy-mm-dd' , autoclose:true});
        }, 0);
    }


    //navButtons
    jQuery(grid_selector).jqGrid('navGrid',pager_selector,
            {   //navbar options
                edit: false,
                editicon : 'icon-pencil blue',
                add: false,
                addicon : 'icon-plus-sign purple',
                del: false,
                delicon : 'icon-trash red',
                search: false,
                searchicon : 'icon-search orange',
                refresh: true,
                refreshicon : 'icon-refresh green',
                view: false,
                viewicon : 'icon-zoom-in grey',
                edittext:'编辑订单',
                addtext:'添加订单',
                refreshtext:'刷新订单'
            },
            {
                //edit record form
                //closeAfterEdit: true,
                recreateForm: true,
                beforeShowForm : function(e) {
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                    style_edit_form(form);
                }
            },
            {
                //new record form
                closeAfterAdd: true,
                recreateForm: true,
                viewPagerButtons: false,
                beforeShowForm : function(e) {
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                    style_edit_form(form);
                }
            },
            {
                //delete record form
                recreateForm: true,
                beforeShowForm : function(e) {
                    var form = $(e[0]);

                    if(form.data('styled')) return false;

                    form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
                    style_delete_form(form);

                    form.data('styled', true);
                },
                onClick : function(e) {
                    alert(1);
                }
            },
            {
                //search form
                recreateForm: true,
                afterShowSearch: function(e){
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                    style_search_form(form);
                },
                afterRedraw: function(){
                    style_search_filters($(this));
                }
                ,
                multipleSearch: true,
                /**
                 multipleGroup:true,
                 showQuery: true
                 */
            },
            {
                //view record form
                recreateForm: true,
                beforeShowForm: function(e){
                    var form = $(e[0]);
                    form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
                }
            }
    )



    function style_edit_form(form) {
        //enable datepicker on "sdate" field and switches for "stock" field
        form.find('input[name="starttime"],input[name="endtime"]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
                .end().find('input[name=finshed]')
                .addClass('ace ace-switch ace-switch-6').wrap('<label class="inline" />').after('<span class="lbl"></span>');
        form.find('#tr_id').remove();
        //update buttons classes
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm').find('[class*="-icon"]').remove();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-primary').prepend('<i class="icon-ok"></i>');
        buttons.eq(1).prepend('<i class="icon-remove"></i>')

        buttons = form.next().find('.navButton a');
        buttons.find('.ui-icon').remove();
        buttons.eq(0).append('<i class="icon-chevron-left"></i>');
        buttons.eq(1).append('<i class="icon-chevron-right"></i>');
    }

    function style_delete_form(form) {
        var id=$("#grid-table").jqGrid('getRowData', id);
        var row = $("#grid-table").jqGrid('getGridParam','selrow');//选中的那一行
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm').find('[class*="-icon"]').remove();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-danger').prepend('<i class="icon-trash"></i>');
        buttons.eq(1).prepend('<i class="icon-remove"></i>')
    }

    function style_search_filters(form) {
        form.find('.delete-rule').val('X');
        form.find('.add-rule').addClass('btn btn-xs btn-primary');
        form.find('.add-group').addClass('btn btn-xs btn-success');
        form.find('.delete-group').addClass('btn btn-xs btn-danger');
    }
    function style_search_form(form) {
        var dialog = form.closest('.ui-jqdialog');
        var buttons = dialog.find('.EditTable')
        buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'icon-retweet');
        buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'icon-comment-alt');
        buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'icon-search');
    }

    function beforeDeleteCallback(e) {
        var form = $(e[0]);
        if(form.data('styled')) return false;

        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
        style_delete_form(form);

        form.data('styled', true);
    }

    function beforeEditCallback(e) {
        var form = $(e[0]);
        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
        style_edit_form(form);
    }


    //it causes some flicker when reloading or navigating grid
    //it may be possible to have some custom formatter to do this as the grid is being created to prevent this
    //or go back to default browser checkbox styles for the grid
    function styleCheckbox(table) {
        /**
         $(table).find('input:checkbox').addClass('ace')
         .wrap('<label />')
         .after('<span class="lbl align-top" />')


         $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
         .find('input.cbox[type=checkbox]').addClass('ace')
         .wrap('<label />').after('<span class="lbl align-top" />');
         */
    }


    //unlike navButtons icons, action icons in rows seem to be hard-coded
    //you can change them like this in here if you want
    function updateActionIcons(table) {
        /**
         var replacement =
         {
             'ui-icon-pencil' : 'icon-pencil blue',
             'ui-icon-trash' : 'icon-trash red',
             'ui-icon-disk' : 'icon-ok green',
             'ui-icon-cancel' : 'icon-remove red'
         };
         $(table).find('.ui-pg-div span.ui-icon').each(function(){
                        var icon = $(this);
                        var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
                        if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
                    })
         */
    }

    //replace icons with FontAwesome icons like above
    function updatePagerIcons(table) {
        var replacement =
        {
            'ui-icon-seek-first' : 'icon-double-angle-left bigger-140',
            'ui-icon-seek-prev' : 'icon-angle-left bigger-140',
            'ui-icon-seek-next' : 'icon-angle-right bigger-140',
            'ui-icon-seek-end' : 'icon-double-angle-right bigger-140'
        };
        $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
            var icon = $(this);
            var $class = $.trim(icon.attr('class').replace('ui-icon', ''));

            if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
        })
    }

    function enableTooltips(table) {
        $('.navtable .ui-pg-button').tooltip({container:'body'});
        $(table).find('.ui-pg-div').tooltip({container:'body'});
    }

    //var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');
});




</script>
<script type="text/javascript">

    function submitOrder(id){
        var url="<?php echo U('Art/submitOrder');?>";
        $.post(url,{'id':id}, function(data){
            window.location.href="<?php echo U('Art/complete',array('num'=>2));?>";
            /*if(data.status=='1'){
                jQuery("#grid-table").trigger("reloadGrid");
            }*/
        });
    }
    function golist(url){
        window.location.href=url;

    }
    function clickpics(){
        var colorbox_params = {
            reposition:true,
            scalePhotos:true,
            scrolling:false,
            previous:'<i class="icon-arrow-left"></i>',
            next:'<i class="icon-arrow-right"></i>',
            close:'&times;',
            current:'{current} of {total}',
            maxWidth:'100%',
            maxHeight:'100%',
            onOpen:function(){
                document.body.style.overflow = 'hidden';
            },
            onClosed:function(){
                document.body.style.overflow = 'auto';
            },
            onComplete:function(){
                $.colorbox.resize();
            }
        };
        $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
        $("#cboxLoadingGraphic").append("<i class='icon-spinner orange'></i>");//let's add a custom loading icon
    }

</script>

</body>
</html>