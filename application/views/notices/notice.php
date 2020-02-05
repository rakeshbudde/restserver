<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('header'); ?>
<title>Notices</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

<style>



/*Forms setup*/
.form-control {
    border-radius:0;
    box-shadow:none;
    height:auto;
}
.float-label{
    font-size:10px;
}
input[type="email"].form-control,
input[type="text"].form-control,
input[type="search"].form-control{
    border:none;
    border-bottom:1px dotted #CFCFCF;
}
textarea {
    border:1px dotted #CFCFCF!important;
    height:130px!important;
}
/*Content Container*/
.content-container {
    background-color:#fff;
    padding:35px 20px;
    margin-bottom:20px;
}

/*Compose*/
.btn-send{
    text-align:center;
    margin-top:20px;
}
/*mail list*/

ul.mail-list{
    padding:0;
    margin:0;
    list-style:none;
    margin-top:30px;
}
ul.mail-list li a{
    display:block;
    border-bottom:1px dotted #CFCFCF;
    padding:20px;
    text-decoration:none;
}
ul.mail-list li:last-child a{
    border-bottom:none;
}
ul.mail-list li a:hover{
    background-color:#DBF9FF;
}
ul.mail-list li span{
    display:block;
}
ul.mail-list li span.mail-sender,.mail-sender-date{
    font-weight:600;
    color:#8F8F8F;
}
ul.mail-list li span.mail-subject{
    color:#8C8C8C;
}
ul.mail-list li span.mail-message-preview{
    display:block;
    color:#A8A8A8;
}
.mail-search{
    border-bottom-color:#7FBCC9!important; 
}
.file-upload {
    position: absolute;
    top: 0;
    left: 0;
    width:100%;
    height:100%;
    opacity: 0;
    cursor: pointer;
}

/*pagination*/
.pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 12px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #e2e2e2;
    margin: 0 2px 2px 0px;
}

.pagination a.active {
    background-color: #0077dd;
    color: white;
    border: 1px solid #e2e2e2;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
/*pagination end*/

</style>

<!-- text editor-->
    <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
	//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
	//]]>
	</script>
	<!-- text editor end-->

<script>

!function(a,b){function g(b,c){this.$element=a(b),this.settings=a.extend({},f,c),this.init()}var e="floatlabel",f={slideInput:!0,labelStartTop:"20px",labelEndTop:"10px",paddingOffset:"10px",transitionDuration:.3,transitionEasing:"ease-in-out",labelClass:"",typeMatches:/text|password|email|number|search|url/};g.prototype={init:function(){var a=this,c=this.settings,d=c.transitionDuration,e=c.transitionEasing,f=this.$element,g={"-webkit-transition":"all "+d+"s "+e,"-moz-transition":"all "+d+"s "+e,"-o-transition":"all "+d+"s "+e,"-ms-transition":"all "+d+"s "+e,transition:"all "+d+"s "+e};if("INPUT"===f.prop("tagName").toUpperCase()&&c.typeMatches.test(f.attr("type"))){var h=f.attr("id");h||(h=Math.floor(100*Math.random())+1,f.attr("id",h));var i=f.attr("placeholder"),j=f.data("label"),k=f.data("class");k||(k=""),i&&""!==i||(i="You forgot to add placeholder attribute!"),j&&""!==j||(j=i),this.inputPaddingTop=parseFloat(f.css("padding-top"))+parseFloat(c.paddingOffset),f.wrap('<div class="floatlabel-wrapper" style="position:relative"></div>'),f.before('<label for="'+h+'" class="label-floatlabel '+c.labelClass+" "+k+'">'+j+"</label>"),this.$label=f.prev("label"),this.$label.css({position:"absolute",top:c.labelStartTop,left:f.css("padding-left"),display:"none","-moz-opacity":"0","-khtml-opacity":"0","-webkit-opacity":"0",opacity:"0"}),c.slideInput||f.css({"padding-top":this.inputPaddingTop}),f.on("keyup blur change",function(b){a.checkValue(b)}),b.setTimeout(function(){a.$label.css(g),a.$element.css(g)},100),this.checkValue()}},checkValue:function(a){if(a){var b=a.keyCode||a.which;if(9===b)return}var c=this.$element,d=c.data("flout");""!==c.val()&&c.data("flout","1"),""===c.val()&&c.data("flout","0"),"1"===c.data("flout")&&"1"!==d&&this.showLabel(),"0"===c.data("flout")&&"0"!==d&&this.hideLabel()},showLabel:function(){var a=this;a.$label.css({display:"block"}),b.setTimeout(function(){a.$label.css({top:a.settings.labelEndTop,"-moz-opacity":"1","-khtml-opacity":"1","-webkit-opacity":"1",opacity:"1"}),a.settings.slideInput&&a.$element.css({"padding-top":a.inputPaddingTop}),a.$element.addClass("active-floatlabel")},50)},hideLabel:function(){var a=this;a.$label.css({top:a.settings.labelStartTop,"-moz-opacity":"0","-khtml-opacity":"0","-webkit-opacity":"0",opacity:"0"}),a.settings.slideInput&&a.$element.css({"padding-top":parseFloat(a.inputPaddingTop)-parseFloat(this.settings.paddingOffset)}),a.$element.removeClass("active-floatlabel"),b.setTimeout(function(){a.$label.css({display:"none"})},1e3*a.settings.transitionDuration)}},a.fn[e]=function(b){return this.each(function(){a.data(this,"plugin_"+e)||a.data(this,"plugin_"+e,new g(this,b))})}}(jQuery,window,document);


$(document).ready(function(){
    $('.form-control').floatlabel({
        labelClass: 'float-label',
        labelEndTop: 5
    });
});
<!-- upload js -->
function initializeFileUploads() {
    $('.file-upload').change(function () {
        var file = $(this).val();
        $(this).closest('.input-group').find('.file-upload-text').val(file);
    });
    $('.file-upload-btn').click(function () {
        $(this).find('.file-upload').trigger('click');
    });
    $('.file-upload').click(function (e) {
        e.stopPropagation();
    });
}


// On document load:
$(function() {
    initializeFileUploads();
});
<!-- upload js end-->


<!-- checkbox js -->
	$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});
<!-- checkbox js end-->
</script>
</head>
<body>
<div class="container">
  <ul class="nav nav-tabs" role="tablist">
  <?php $username= $this->session->userdata('username'); ?>
	<?php if($username == 'superadmin'): ?>
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#home"><i class="fas fa-plus-square"></i> New</a>
    </li>
	<?php endif; ?>
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#menu1"><i class="fas fa-inbox"></i> Inbox</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2"><i class="fas fa-envelope-open"></i> Mark as read</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu3"><i class="fas fa-envelope"></i> Mark as unread</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu4"><i class="fas fa-archive"></i> Archive</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane fade">
	<div class="container">
    <div class="content-container clearfix" >
        <div class="col-md-8 col-md-offset-2">
			
			<?php if($error = $this->session->flashdata('msg')){ ?>
			   <p style="color: green;"><?php echo  $error; ?><p>
		  <?php } ?>
		
            <form action="<?php echo base_url(); ?>emailsend/send" method="post">
			<div class="form-group">
                <input type="email" id=""  name="from" class="form-control" placeholder="To" required />
            </div>
            
            
			<div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject" required />
            </div>
			
			<!--<div class="input-group">
				<input type="text" class="form-control file-upload-text" disabled placeholder="select a file..." />
				<span class="input-group-btn">
				<button type="button" class="btn btn-default file-upload-btn">Browse
                <input type="file" class="file-upload" name="myFile" />
				</button>
				</span>
			</div>-->
			<br>
			<div class="form-group"> 
			<textarea name="message"  class="form-control" style="width: 700px; height: 210px;" required> Message... </textarea>
			</div>	
		   
			<div class="form-group ">
				<button class="btn btn-primary" type="submit">SEND</button>
            </div>
			</form>
        </div>
		</div>
	</div>
	</div>
    <div id="menu1" class="container tab-pane active">
      <div class="container" id="mytable">
           <div class="content-container clearfix">
               <div class="col-md-12 ">
                   
				   <div class="col-md-12">
				   <div class="row">
				   <div class="col-md-4"><input type="checkbox" id="checkall"/> <label>Check all</label></div>
				   <div class="col-md-4"></div>
                   <div class="col-md-4"><input type="search" placeholder="Search.." class="form-control mail-search" /></div>
                   </div>
                   </div>
				   
                   <ul class="mail-list" >
                       
                     <li>
                       <a href="">
						<div class="row">
								<div class="col-md-1">
								<input type="checkbox" class="checkthis" />
								<img src="https://res.cloudinary.com/mhmd/image/upload/v1564960395/avatar_usae7z.svg" alt="user" width="30" class="rounded-circle">
								</div>
						   
							<div class="col-md-11">
                               <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Center Admin</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
							</div> 
						</div> 
                      </a>
                    </li>
                       <li>
                          <a href="">
                            <div class="row">
								<div class="col-md-1">
								<input type="checkbox" class="checkthis" />
								</div>
						   
							<div class="col-md-11">
                               <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Center Admin</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
							</div> 
						</div>
                           </a>
                       </li>
                       <li>
                           <a href="">
                            <div class="row">
								<div class="col-md-1">
								<input type="checkbox" class="checkthis" />
								</div>
						   
							<div class="col-md-11">
                               <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Center Admin</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
							</div> 
						</div>
                           </a>
                       </li>
                       <li>
                           <a href="">
                             <div class="row">
								<div class="col-md-1">
								<input type="checkbox" class="checkthis" />
								</div>
						   
							<div class="col-md-11">
                               <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Center Admin</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
							</div> 
							</div>
                           </a>
                       </li>
                   </ul>
               </div>
			   <div class="col-md-12  text-right">
						<div class="pagination">
						  <a href="#">« Prev</a>
						  <a href="#">1</a>
						  <a href="#" class="active">2</a>
						  <a href="#">3</a>
						  <a href="#">4</a>
						  <a href="#">5</a>
						  <a href="#">Next »</a>
						</div>
					</div> 
           </div>
       </div>

    </div>
    <div id="menu2" class="container tab-pane fade">
      <div class="container">
           <div class="content-container clearfix">
               <div class="col-md-12 ">
                  
                   <div class="col-md-12">
				   <div class="row">
				   <div class="col-md-4"></div>
				   <div class="col-md-4"></div>
                   <div class="col-md-4"><input type="search" placeholder="Search.." class="form-control mail-search" /></div>
                   </div>
                   </div>
                   <ul class="mail-list">
                       
                       <li>
                           <a href="">
                               <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Center Admin</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
                           </a>
                       </li>
                      
                       <li>
                           <a href="">
                              <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Employee1</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
                           </a>
                       </li>
                   </ul>
               </div>
           </div>
       </div>
    </div>
	<div id="menu3" class="container tab-pane fade">
		<div class="container">
           <div class="content-container clearfix">
               <div class="col-md-12">
                   
                   <div class="col-md-12">
				   <div class="row">
				   <div class="col-md-4"></div>
				   <div class="col-md-4"></div>
                   <div class="col-md-4"><input type="search" placeholder="Search.." class="form-control mail-search" /></div>
                   </div>
                   </div>
                   
                   <ul class="mail-list">
                       
                       <li>
                           <a href="">
                               <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Center Admin</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
                           </a>
                       </li>
                       <li>
                           <a href="">
                               <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Supervisor</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
                           </a>
                       </li>
                       <li>
                           <a href="">
                              <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Employee1</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
                           </a>
                       </li>
                       
                   </ul>
               </div>
           </div>
       </div>
	</div>
	
	<div id="menu4" class="container tab-pane fade">
		<div class="container">
           <div class="content-container clearfix">
               <div class="col-md-12">
                   
                   <div class="col-md-12">
				   <div class="row">
				   <div class="col-md-4"></div>
				   <div class="col-md-4"></div>
                   <div class="col-md-4"><input type="search" placeholder="Search.." class="form-control mail-search" /></div>
                   </div>
                   </div>
                   
                   <ul class="mail-list">
                       
                       <li>
                           <a href="">
                              <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Center Admin</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
                           </a>
                       </li>
                       <li>
                           <a href="">
                               <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Employee1</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
                           </a>
                       </li>
                       <li>
                           <a href="">
                              <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Supervisor</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
                           </a>
                       </li>
                       <li>
                           <a href="">
                               <div class="row">
                               <div class="col-md-6"><span class="mail-sender">Employee2</span></div>
							   <div class="col-md-6"><span class="mail-sender-date text-right">20/9/2019</span></div>
							   </div>
                               <span class="mail-subject">Test Subject</span>
                               <span class="mail-message-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil eveniet ipsum nisi? Eaque odio quae debitis saepe explicabo alias sit tenetur animi...</span>
                           </a>
                       </li>
                   </ul>
               </div>
           </div>
       </div>
	</div>
  </div>
</div>


</body>


</html>