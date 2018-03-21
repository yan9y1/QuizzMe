function SimpleAjax(url,method,parameters,onSuccess,onFailure) {
	
	if ( onSuccess === undefined )
		onSuccess = function(){};
	
	if ( onFailure === undefined )
		onFailure = function(){};
			
	function getMethod(method) {
		if ( typeof method != "string" )
			throw method + ": bad method (choose 'GET' or 'POST')";
		method = method.trim().toLowerCase();
		if ( method != 'get' && method != 'post' )
			throw method + ": bad method (choose 'GET' or 'POST')";
		return method;
	}
	
	function orsc(xmlhttp) {
		return function() {
			if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 )
				onSuccess(xmlhttp);
			else if ( xmlhttp.readyState == 4 && xmlhttp.status == 404 )
				onFailure(xmlhttp);
		};
	}

	this.url = url;
	this.method = getMethod(method);
	this.parameters = parameters;
	this.xmlhttp = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
	this.xmlhttp.onreadystatechange = orsc(this.xmlhttp);

	if ( this.method == 'get' ) {
		console.log(this.parameters);
		console.log(this.url);
		if ( this.parameters == "" )
			this.xmlhttp.open("GET",this.url,true);
		else
			this.xmlhttp.open("GET",this.url + "?" + this.parameters,true);
		this.xmlhttp.send();
	}
	else {
		this.xmlhttp.open("POST",this.url,true);
		this.xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		this.xmlhttp.send(this.parameters);
	}
}
