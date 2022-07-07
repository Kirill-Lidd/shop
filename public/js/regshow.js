document.getElementById('reg').onclick = show;
document.getElementById('close-reg').onclick = close;

	function show()
	{

		document.getElementById('reg-window').style.display = 'block';	
		document.getElementById('backgr').style.display = 'block'; 		
	}

	function close(){
		document.getElementById('reg-window').style.display = 'none';	
		document.getElementById('backgr').style.display = 'none';
	}
