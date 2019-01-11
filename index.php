<!DOCTYPE html>
<html>
	<head>
	<meta charset='utf-8'>
	<style>
		body{margin:0;background: transparent 
			url('e.jpg') no-repeat fixed;
			background-size: cover;}
		h1{font-size:32px;color:#D1E3F1;text-align:center;}
		
	
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
			
			margin:160px auto;
		}
		.drop{
			width: 300px;
			text-align: center;
			font-weight: bold;
			font-size: 18px;
			background-color: #D1E3F1;
			color:#0093D8;
			margin:auto;
			padding: 10px 0px;
		}
		.down{display:none;}
		.drop:hover .down{display:block;}
		.liste{font-weight: bold;color:#D1E3F1;background-color:#0093D8;}
		.liste:hover{
			background-color: #D1E3F1;
			color:#0093D8;
		}
		li{list-style-type: none;margin:0px;border-bottom: 1px solid white;padding:10px 0px;}
		ul{background-color: red;text-align: center;margin:0px;padding:0px;}
	</style>
	</head>
	<body>
		<h1 id='h'>API Users show</h1>


		<div class="drop">
			<div class="dropdown">Liste users</div>
			<ul class="down">
				<li onclick=check(this.innerText); class='liste'>c</li>
				<li onclick=check(this.innerText); class='liste'>bob</li>
				<li onclick=check(this.innerText); class='liste'>jean</li>
				<li onclick=check(this.innerText); class='liste'>arthur</li>
			</ul>
		</div>

		<div id="ici"></div>
	</body>
	<script>
		//let r;
		function check(r){
			//r = document.getElementById('choise').value;
			var req=new XMLHttpRequest();
			req.open("GET",`user.php?name=${r}`,true);
			req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			req.onreadystatechange=function(){
			if(req.readyState==4 && req.status==200){
				if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
				console.log(req.response);
				let users = JSON.parse(req.response);
				//console.log(users);
				//users["data"].map(f=>document.getElementById('ici').innerHTML +=`<div>${f.id} ${f.name} ${f.email}</div>`);
				document.getElementById('ici').innerHTML =`<div class="up">${users["data"][0].id} ${users["data"][0].name} ${users["data"][0].email}</div>`;
				}
			  }
			};
			req.send();
		}
	</script>
</html>