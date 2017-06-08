$(function(){
	/*
	* Page 构造函数
	* */
		function Page(){
			this.pageNum = 1;
		}
		Page.prototype = {
			constructor:Page,
			getPage:function(){
				return this.pageNum;
			},
			setPage:function(value){
				this.pageNum = value;
			},
			getContent:function(){
				$.ajax({
					url:'/index.php/Home/Index/article_list',
					type:'post',
					dataType:'json',
					data:{page:this.getPage()}
				}).then(function( res ){
					if( res.code == 1){
						if( res.list ){
							var _html ='';
							$.each(res.list,function(k,v){
								console.log( v );
								_html+='<article class="post">\
								<header>\
								<div class="title">\
								<h2><a href="/index.php/Home/Index/article_detail/id/'+ v.id+'">'+ v.title +'</a></h2>\
						<p>'+ v.descript +'</p>\
						</div>\
						<div class="meta">\
								<time class="published" datetime="2015-10-22">'+ v.ctime +'</time>\
						<a href="/index.php/Home/Index/article_detail/id/'+ v.id+'" class="author"><span class="name">'+ v.author +'</span><img src="'+ v.userinfo.avatar+'" alt="" /></a>\
								</div>\
								</header>\
								<a href="/index.php/Home/Index/article_detail/id/'+ v.id+'" class="image featured"><img style="width:100%;height:200px;" src="'+ v.picurl +'" alt="" /></a>\
								<p></p>\
						<footer>\
						<ul class="actions">\
								<li><a href="/index.php/Home/Index/article_detail/id/'+ v.id+'" class="button big">继续阅读</a></li>\
						</ul>\
						<ul class="stats">\
								<li><a href="javascript:;">'+ v.categoryName +'</a></li>\
								<li><a href="javascript:;" class="icon fa-heart">'+ v.like+'</a></li>\
								<li><a href="javascript:;" class="icon fa-comment">'+ v.pv+'</a></li>\
								</ul>\
								</footer>\
								</article>';
							})
							$('#J-main').html( _html );
						}else{
							$('.loading-end').remove();
							$('#J-main').append( '<div class="loading-end" style="color:red;">数据已加载完</div>' );
						}
					}else{
						$('#J-main').append( '<div class="loading-end">暂无数据</div>' );
					}
				})
			},
			nextPage:function(succFn,errFn){
				this.setPage = this.pageNum ++;
				this.getContent();
				if(this.pageNum == 1){
					$('#J-prev-page').addClass('disabled');
				}else{
					$('#J-prev-page').removeClass('disabled');
				}

			},
			prevPage:function(succFn,errFn){
				if(this.pageNum != 1){
					$('#J-prev-page').removeClass('disabled');
					this.setPage = this.pageNum --;
				}else{
					$('#J-prev-page').addClass('disabled');
				}

				this.getContent(succFn,errFn);
			}

		};
		//实例化page类
		var pageObj = new Page();
		pageObj.getContent();

		//下一页
		$('#J-next-page').on('click',function(){
			pageObj.nextPage();
		})
		//上一页
		$('#J-prev-page').on('click',function(){
			pageObj.prevPage();
		})
});