function checkinput() {
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(!document.forms['login']['username'].value.match(alphaExp)){
		alert('Please input alphanumeric only!');
		return false;
	}
}
