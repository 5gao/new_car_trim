function GetoldUrl(){
	//var oldUrl="http://api.wefi.com.cn/Homeadmin/web/?";
    var host =  window.location.host;

	//var oldUrl="http://" + host + "/web/index.php?";
	var oldUrl="http://" + host + "/web/?";
	return oldUrl;
};
function GetUrl(name) {
	var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i"); 
	var r = window.location.search.substr(1).match(reg); 
	if (r != null) return unescape(r[2]); return null; 
}; 
function setCookie(c_name,value,expiredays){
	var exdate=new Date()
	exdate.setDate(exdate.getDate()+expiredays)
	document.cookie=c_name+ "=" +escape(value)+
	((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
};
function getCookie(c_name){
if (document.cookie.length>0)
  {
  c_start=document.cookie.indexOf(c_name + "=")
  if (c_start!=-1)
    { 
    c_start=c_start + c_name.length+1 
    c_end=document.cookie.indexOf(";",c_start)
    if (c_end==-1) c_end=document.cookie.length
    return unescape(document.cookie.substring(c_start,c_end))
    } 
  }
return ""
};
//
function getDates(dates){
	var d = new Date(dates);
    var dateS=d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
	return dateS;
	
};
function diy_time(time1,time2){
    time1 = Date.parse(new Date(time1));
    time2 = Date.parse(new Date(time2));
    return time3 = Math.abs(parseInt((time2 - time1)/1000/3600/24));
};
function com_time(time1){
	var   d=new   Date(Date.parse(time1 .replace(/-/g,"/")));
	var   curDate=new   Date();
	if(d >=curDate){
	return true;
	}
};
function isIE() { 
    if (!!window.ActiveXObject || "ActiveXObject" in window)  
        return true;  
    else  
        return false;  
}
//new Vue().$mount('#links');