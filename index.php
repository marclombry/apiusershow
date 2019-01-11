<!DOCTYPE html>
<html>
	<head>
	<meta charset='utf-8'>
	<style>
		body{margin:0;background: transparent 
			url('e.jpg') no-repeat fixed;
			background-size: cover;}
		h1{font-size:32px;color:#D1E3F1;text-align:center;}
		.selecte{
			text-align: center;
		}
		select{
			width: 300px;
			height: 40px;
			text-align: center;
			font-weight: bold;
			font-size: 18px;
			border-radius: 9%;
			background-color: #0093D8;
			color:#D1E3F1;
		}
		select option{
			
			font-weight: bold;
			font-size: 18px;
		}
		label{font-size: 24px;font-weight: bold;}
		.up{
			text-align: center;
			background-color:#D1E3F1;
			color:#0093D8;
			padding: 40px 0px;
			font-weight: bold;
			font-size: 28px;
			width: 300px;
			margin:60px auto;
		}
		#ici{
			
			margin:60px auto;
		}
	</style>
	</head>
	<body>
		<h1 id='h'>API Users show</h1>
		<div class="selecte">
		<form method ='post' action='' id='myForm'>
			<select name='choise' id='choise' onchange="check()">
				<option class='' value='c'>c</option>
				<option class='' value='bob'>bob</option>
				<option class='' value='jean'>jean</option>
				<option class='' value='arthur'>arthur</option>
			</select>
		
		</form>
		</div>
		<div id="ici"></div>
	</body>
	<script>
		let r;
		function check(){
			r = document.getElementById('choise').value;
			var req=new XMLHttpRequest();
			req.open("GET",`user.php?name=${r}`,true);
			req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			req.onreadystatechange=function(){
			if(req.readyState==4 && req.status==200){
				if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
				console.log(req.response);
				let users = JSON.parse(req.response);
				console.log(users);
				//users["data"].map(f=>document.getElementById('ici').innerHTML +=`<div>${f.id} ${f.name} ${f.email}</div>`);
				document.getElementById('ici').innerHTML =`<div class="up">${users["data"][0].id} ${users["data"][0].name} ${users["data"][0].email}</div>`;
				}
			  }
			};
			req.send();
		}
	</script>
</html>