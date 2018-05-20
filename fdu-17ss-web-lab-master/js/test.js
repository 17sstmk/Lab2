var row = 0 ; //����ȫ�����������޸�
var reg_email = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/; //�����ж������ʽ
var reg_name = /^((\w*\d\w*[a-z]\w*)|(\w*[a-z]\w*\d\w*))$/i; //�����ж��û�����ʽ
var reg_chinese = /^[\u0391-\uFFE5]+$/ ; //�����ж�������ʽ
var reg_pass = /^((\w*\d\w*[a-z]\w*)|(\w*[a-z]\w*\d\w*))$/i;//�����ж������ʽ
//----��ȡ�к�-----
function getRow(r){
 var i=r.parentNode.parentNode.rowIndex; 
 return i ;
}
//----��ȡ�к�-----
 
//----ɾ��ĳһ��-----
function delRow(r){ 
 document.getElementById('table').deleteRow(getRow(r));
}
//----ɾ��ĳһ��-----
 
//----��������Ϣ�������-----
function cleanAddInput(){
 document.getElementById('username').value='';
 document.getElementById('password').value=''; 
 document.getElementById('name').value='';
 document.getElementById('email').value='';
 document.getElementById('phone').value='';
 document.getElementById('qq').value='';
 document.getElementById('uid').value='';
}
//----��������Ϣ�������-----
 
//----��ʾ�����Ϣ��-----
function showAddInput(){
 document.getElementById('addinfo').style="display:block-inline" ;
 document.getElementById('btn_add').style="display:block-inline" ;
 document.getElementById('btn_update').style="display:none" ;
 cleanAddInput(); 
}
//----��ʾ�����Ϣ��-----
 
//----���������Ϣ��-----
function hideAddInput(){
 document.getElementById('addinfo').style="display:none" ;
 
}
//----���������Ϣ��-----
 
//----�ж���������Ϣ�Ƿ����Ҫ��-----
function judge(){
 //����id��ȡ����Ϣ
 var username = document.getElementById('username').value;
 var password = document.getElementById('password').value; 
 var name = document.getElementById('name').value;
 var email = document.getElementById('email').value;
 var phone = document.getElementById('phone').value;
 var qq = document.getElementById('qq').value;
 var uid = document.getElementById('uid').value;
 var judge = true ; //�����жϱ���Ϣ�Ƿ����
 if(username==''){
  judge = false ;
  alert('�������û���');
 }else if(password==''){
  judge = false ;
  alert('����������');
 }else if(name==''){
  judge = false ;
  alert('����������');
 }else if(email==''){
  judge = false ;
  alert('����������');
 }else if(phone==''){
  judge = false ;
  alert('������绰');
 }else if(qq==''){
  judge = false ;
  alert('������qq');
 }else if(uid==''){
  judge = false ;
  alert('���������֤');
 }else if(uid.length!=18){
  judge = false ;
  alert('���֤ӦΪ18λ������ȷ��д');
 }else if(qq.length<=5 &&qq.length>=13){
  judge = false ;
  alert('����ȷ����qq����');
 }else if(phone.length<3&&qq.length>12){
  judge = false ;
  alert('����ȷ����绰');
 }else if(!reg_email.test(email)){
  judge = false ;
  alert('�����ʽ����ȷ');
 }else if(!reg_name.test(username)){
  judge = false ;
  alert('�û�����ʽ����ȷ');
 }else if(!reg_chinese.test(name)){
  judge = false ;
  alert('������ʽ����ȷ');
 }else if((!reg_pass.test(password))||password.length<6){
  judge = false ;
  alert('�����ʽ����ȷ');
 }
  
 return judge ;
}
//----�ж���������Ϣ�Ƿ����Ҫ��-----
 
//----������Ϣ�Ĳ��뷽��-----
function insertInfo(){
 //����id��ȡ����Ϣ
 var arr = new Array();
 arr[0] = document.getElementById('username').value;
 arr[1] = document.getElementById('password').value; 
 arr[2] = document.getElementById('name').value;
 arr[3] = document.getElementById('email').value;
 arr[4] = document.getElementById('phone').value;
 arr[5] = document.getElementById('qq').value;
 arr[6] = document.getElementById('uid').value;
 arr[7] ="<a style='text-align:center;color:blue;cursor:pointer;' onclick='updateRow(this);'>�޸�</a> <a style='text-align:center;color:blue;cursor:pointer;' onclick='delRow(this);'>ɾ��</a>";
 var x = document.getElementById('table').insertRow(1); //��ȡ��һ�ж���
  
 for(var i=0;i<arr.length;i++){
  x.insertCell(i).innerHTML = arr[i] ; //��ѭ����ÿ�����ݲ����һ�е�ÿһ��
 }
  
}
//----������Ϣ�Ĳ��뷽��-----
 
//----������Ϣ-----
function addInfo(){
  
 if(judge()==true){
  alert('��ӳɹ�');
  insertInfo(); //ִ�в���
  hideAddInput(); //���������Ϣ��
   
 }else{
  alert('���ʧ��');
 }
}
//----������Ϣ-----
 
 
//----�����к��޸���Ϣ-----
function updateRow(r){
 row = getRow(r); //�Ѹ��кŸ�ֵ��ȫ�ֱ���
 showAddInput(); //��ʾ�޸ı�
 //�ύ��ť�滻
 document.getElementById('btn_add').style="display:none" ;
 document.getElementById('btn_update').style="display:block-inline" ;
 insertInputFromQuery(queryInfoByRow(row));
  
}
//----�����к��޸���Ϣ-----
 
 
//----�����кŲ���Ϣ----
function queryInfoByRow(r){
  
 var arr = new Array();
 for(var m=0 ; m<7;m++){
  arr[m] = document.getElementById('table').rows[row].cells[m].innerText;
 }
 return arr ; //���ظ�������
  
}
//----�����кŲ���Ϣ----
 
//----�Ѳ�ѯ������Ϣ�����޸ĵı���----
function insertInputFromQuery(arr){
 document.getElementById('username').value = arr[0];
 document.getElementById('password').value = arr[1];
 document.getElementById('name').value = arr[2];
 document.getElementById('email').value = arr[3];
 document.getElementById('phone').value = arr[4];
 document.getElementById('qq').value = arr[5];
 document.getElementById('uid').value = arr[6];
  
}
//----�Ѳ�ѯ������Ϣ�����޸ĵı���----
 
 
function updateInfo(){
 if(judge()==true){
  alert('�޸ĳɹ�');
  document.getElementById('table').deleteRow(row);//ɾ��ԭ������  
  insertInfo(); //�����޸ĺ��ֵ
  hideAddInput(); //�������ģ��
 }else{
  alert('�޸�ʧ��');
  hideAddInput();
 }
}
