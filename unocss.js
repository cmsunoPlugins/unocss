//
// CMSUno
// Plugin Uno CSS
//
function f_cssuno(){
	let x=new FormData();
	x.set('action','save');
	x.set('unox',Unox);
	x.set('css',document.getElementById('inputCSS').value);
	fetch('uno/plugins/unocss/unocss.php',{method:'post',body:x})
	.then(r=>r.text())
	.then(r=>f_alert(r));
}
//
function f_load_cssuno(){
	fetch("uno/data/"+Ubusy+"/unocss.json?r="+Math.random())
	.then(r=>r.json())
	.then(function(data){
		let x = data.tex.replace(/\\/g,'');
		document.getElementById('inputCSS').value=x;
	});
}
//
f_load_cssuno()
