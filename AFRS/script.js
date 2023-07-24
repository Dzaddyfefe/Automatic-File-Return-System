const toggle = document.getElementById('toggleDark');
const body= document.querySelector('body');

toggle.addEventListener('click',function(){
	this.classList.toggle('bxs-moon');
	if(this.classList.toggle('bx-sun')){
		body.style.background='white';
		body.style.transition='2s';
	}else{
		body.style.background='black';
		body.style.color='white';
		footer.style.background='white';
		footer.style.coloe='black';
		body.style.transition='2s';
	}
})