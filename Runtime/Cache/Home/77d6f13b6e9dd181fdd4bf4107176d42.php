<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>订单系统后台登录</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="/Public/acestyle/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/Public/acestyle/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="/Public/acestyle/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->


		<!-- ace styles -->

		<link rel="stylesheet" href="/Public/acestyle/css/ace.min.css" />
		<link rel="stylesheet" href="/Public/acestyle/css/ace-rtl.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/Public/acestyle/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/Public/acestyle/js/html5shiv.js"></script>
		<script src="/Public/acestyle/js/respond.min.js"></script>
		<![endif]-->
		<link type="text/css" href="/Public/acestyle/mycss/login.css" rel="stylesheet">
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="icon-leaf green"></i>
									<span class="red">Order</span>
									<span class="white">System</span>
								</h1>
								<h4 class="blue">&copy; 下单管理系统</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												请输入你的账号密码
											</h4>

											<div class="space-6"></div>

											
										<form id="validation-form" method="post" action="" >
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right" >
														<input type="text"  id="name"  style="width:60%;" name="name" class="form-control" placeholder="管理员帐号" />
														<i class="icon-user"></i>
													</span>
												</label>
                                                
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" id="password"  style="width:60%;" name="password" class="form-control" placeholder="管理员密码" />
														<i class="icon-lock"></i>
													</span>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-left">
														<input type="text" id="verify"  style="width:25%;" name="verify" class="form-control" placeholder="验证码" />
														<a onClick="changeVerify()" href="javascript:void(0)"><img id="verifyImg" src="<?php echo U('Login/verify');?>"  title="点击刷新验证码" /></a>
													</span>
												</label>

												<div class="space"></div>

												<div class="clearfix">
													<button type="reset" class="width-35 pull-left btn btn-sm btn-info">
														<i class="icon-refresh"></i>
														重置
													</button>

													<button  class="width-35 pull-right btn btn-sm btn-primary" data-last="Finish">
														<i class="icon-key"></i>
														登录
													</button>
												</div>

												<div class="space-4"></div>
											</fieldset>
										</form>

											<div class="social-or-login center">
												<span class="bigger-110">或者用以下方式登录</span>
											</div>

											<div class="social-login center">
												<a class="btn btn-primary">
													<i class="icon-facebook"></i>
												</a>

												<a class="btn btn-info">
													<i class="icon-twitter"></i>
												</a>

												<a class="btn btn-danger">
													<i class="icon-google-plus"></i>
												</a>
											</div>
										</div><!-- /widget-main -->
                                        <div class="toolbar clearfix">
                                            <div style="width:100%;text-align:center;">
                                                <h5 class="user-signup-link">
                                                    天堃传媒CRM  记忆--于2014年09月01日开发
                                                    <i class="icon-arrow-right"></i>
                                                </h5>
                                            </div>
                                        </div>

									</div><!-- /widget-body -->
								</div><!-- /login-box -->

							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="/Public/acestyle/js/jquery-2.0.3.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Public/acestyle/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/Public/acestyle/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/Public/acestyle/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		 <script src="/Public/acestyle/js/bootstrap.min.js"></script>
	    <!--##################对话框的函数###################-->
	    <script src="/Public/acestyle/js/bootbox.min.js"></script>
	    <script src="/Public/acestyle/js/jquery.easy-pie-chart.min.js"></script>
	    <script src="/Public/acestyle/js/jquery.gritter.min.js"></script>
	    <!--##################对话框的函数###################-->
	    <script src="/Public/acestyle/js/ace-elements.min.js"></script>
	    <script src="/Public/acestyle/js/ace.min.js"></script>
		<script src="/Public/acestyle/myjs/jquery.validate.min.js"></script>

		<!-- inline scripts related to this page -->
		
		<script type="text/javascript">
			function show_box(id) {
			 jQuery('.widget-box.visible').removeClass('visible');
			 jQuery('#'+id).addClass('visible');
			}

		jQuery(function($) {
			$('#validation-form').validate({
					errorElement: 'i',
					errorClass: 'help-block',
					focusInvalid: true,
					rules: {
						name: {
							required: true
						},
						password: {
							required: true
						},
						verify: {
							required: true
						},

					},						
					messages: {
						name: {
							required: "请输入帐号！",
							
						},
						password: {
							required: "请输入密码",
						},
						verify: "请输入验证码",
					},
			
					invalidHandler: function (event, validator) { //display error alert on form submit   
						$('.alert-danger', $('.login-form')).show();
					},
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
						$(e).remove();
					},
					submitHandler: function (form) {
						ajaxSubmitForm();
						//form.submit();  
					},//这是关键的语句，配置这个参数后表单不会自动提交，验证通过之后会去调用的方法	
					invalidHandler: function (form) {
					}
				});
		})
		//弹框提示
		function showmsg(msg) {
			bootbox.dialog({
				message: "<span class='bigger-110'>"+msg+"</span>",
				buttons: 			
				{
					"danger" :
					{
						"label" : "确定",
						"className" : "btn-sm btn-danger",
						"callback": function() {
							//Example.show("uh oh, look out!");
						}
					}, 
				}
			});
		}
		//点击刷新验证码
		function changeVerify(){
			var timenow = new Date().getTime();
			$('#verifyImg').attr('src',"<?php echo U('Login/verify');?>?"+timenow);  
		}
		//ajax提交验证表单
		function ajaxSubmitForm() {
			var name = $('#name').val();
			var password = $('#password').val();
			var verify = $('#verify').val();
			$.post("<?php echo U('Login/checkLogin');?>",{verify:verify,name:name,password:password},function(result){
				//alert(result.msg);
				if (result.status!='100') {
					//$.messager.alert("提示",result.info,'info');
					$('#verify').val("");
					changeVerify();
					showmsg(result.msg);
					return false;                    
				} else {
					window.location.href = "<?php echo U('Index/index');?>";
				}
			},'json');
		}

	</script>
</body>
</html>