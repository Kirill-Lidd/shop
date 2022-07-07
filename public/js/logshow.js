document.getElementById('login').onclick = showLog;
document.getElementById('close-log').onclick = close;

	function showLog()
	{

		document.getElementById('log-window').style.display = 'block';	
		document.getElementById('backgr').style.display = 'block'; 		
	}

	function close(){
		document.getElementById('log-window').style.display = 'none';	
		document.getElementById('backgr').style.display = 'none';
	}
