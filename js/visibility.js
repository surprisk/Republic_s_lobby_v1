var a;
function visibility(){
	if(a != null){
			document.getElementById('contact').style.display = 'none';
			a = null;
	}
	else{
		document.getElementById('contact').style.display = 'block';
		a='visible';
	}
}