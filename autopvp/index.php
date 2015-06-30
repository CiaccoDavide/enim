<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./tooltipster.css" />
    <link rel="stylesheet" href="./jquery.mCustomScrollbar.css" />
  <style type="text/css">
  *               {padding:0;margin:0;font-family: Verdana,Geneva,sans-serif;}
  body            {background:#111;color:#eee;font-size:11px;overflow-x:scroll;padding-top:20px;}
  h2              {font-size:20px;font-weight: 100;padding-top: 10px}
  .main,.gear,.inventory,.minions    {text-align:center;position:relative;display:inline-block;height:620px;/*float:left;*/width:330px;margin-left:10px;box-shadow:inset 0 0 10px 0 #000;border:solid 1px #333;overflow:hidden;border-radius: 3px;}
  button b        {font-size:12px;}
  button          {background:#333;border:solid 1px #f93;color:#fff;border-radius:3px;font-size:10px;padding:6px;cursor:pointer;width:100%;height:auto;margin-top:3px;margin-bottom:3px;text-align:left;}
  button:active   {cursor:pointer;background:#333;border:solid 1px #39f;color:#fff;margin-top:5px;}
  a,a:visited     {color:#eee;text-decoration:none;}
  a:hover         {color:#fff;text-decoration:underline;}
  footer          {position:fixed;bottom:0;font-size:10px;padding:0 0 0 6px;/*top right bottom left*/}
  footer a:hover  {color:#f39;}
  #on             {background:#333;border:solid 1px #f93;color:#fff;}
  #off            {background:#222;border:solid 1px #642;color:#666;}
  #off g          {color:#555}
  #bought         {background:#222;border:solid 1px #396;color:#666;}
  #bought g       {color:#555}
  #achieved       {background:#222;border:solid 1px #396;color:#eee;}
  #stats          {text-align:left;padding:10px;font-size:11px;}
  g               {color:#bdbdbd;}
  #mine{position:absolute;z-index:-1;left:10px;top:110px;}
  .subpanelL{width:161px;margin: 0;float: left;text-align: right;padding:2px;color:#aaa;}
  .subpanelR{width:161px;margin: 0;float: left;text-align: left;padding:2px;}
  .div{float: left;width: 330px;}
  progress{border: solid 1px #333;width:280px;height:20px;padding:1px;background: #111;box-shadow:inset 0 0 3px 0 #000;border-radius: 4px;}
  -webkit-progress-value{background: #1bed7d; /* Old browsers */
background: -moz-linear-gradient(top,  #1bed7d 0%, #07a955 18%, #13b564 96%, #40e48f 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1bed7d), color-stop(18%,#07a955), color-stop(96%,#13b564), color-stop(100%,#40e48f)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #1bed7d 0%,#07a955 18%,#13b564 96%,#40e48f 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #1bed7d 0%,#07a955 18%,#13b564 96%,#40e48f 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #1bed7d 0%,#07a955 18%,#13b564 96%,#40e48f 100%); /* IE10+ */
background: linear-gradient(to bottom,  #1bed7d 0%,#07a955 18%,#13b564 96%,#40e48f 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1bed7d', endColorstr='#40e48f',GradientType=0 ); /* IE6-9 */
border-radius: 2px;}
  progress[value]::-moz-progress-bar{background: #1bed7d; /* Old browsers */
background: -moz-linear-gradient(top,  #1bed7d 0%, #07a955 18%, #13b564 96%, #40e48f 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1bed7d), color-stop(18%,#07a955), color-stop(96%,#13b564), color-stop(100%,#40e48f)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #1bed7d 0%,#07a955 18%,#13b564 96%,#40e48f 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #1bed7d 0%,#07a955 18%,#13b564 96%,#40e48f 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #1bed7d 0%,#07a955 18%,#13b564 96%,#40e48f 100%); /* IE10+ */
background: linear-gradient(to bottom,  #1bed7d 0%,#07a955 18%,#13b564 96%,#40e48f 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1bed7d', endColorstr='#40e48f',GradientType=0 ); /* IE6-9 */
border-radius: 2px;
}
.icons{height: 40px;width: 330px;padding: 3px;}
.icons span{border: solid 1px #333;width:38px;height:38px;padding:1px;box-shadow:inset 0 0 3px 0 #000;border-radius: 4px;float: left;margin: 6px}
.icons:hover{cursor:pointer;}
.invslot span{/*border: solid 1px #333;*/background:rgba(0,0,0,0.1);width:38px;height:38px;padding:1px;box-shadow:inset 0 0 3px 3px #000;border-radius: 4px;float: left;margin: 6px}
.invslot:hover{cursor:pointer;}
.slots{width: 300px;padding:20px;}
.slots span{/*border: solid 1px #333;*/width:28px;height:28px;box-shadow:inset 0 0 2px 2px #000;border-radius: 4px;float: left;margin: 3px}
.slots:hover{cursor:pointer;}
.minion{width: 330px;padding: 3px;text-align: left;float: left;margin-left: 10px;}
.minion .upgrade{border: solid 1px #333;width:38px;height:38px;padding:1px;box-shadow:inset 0 0 3px 0 #000;border-radius: 4px;float: left;margin: 6px}
.minion .buy{border: solid 1px #333;width:38px;height:38px;padding:1px;box-shadow:inset 0 0 3px 0 #000;border-radius: 4px;float: left;margin: 6px}
.minion small,h4{display: inline-block;}
.minion .upgrade:hover{cursor:pointer;}
.minion .buy:hover{cursor:pointer;}
.upgrade{}
.upon{background: url("./icon_up.png");background-position: right 1px top 2px; !important}
.upoff{background: url("./icon_up_off.png");background-position: right 1px top 2px; !important}
#level{margin-top:-21px;margin-bottom: 20px;text-shadow:0 0 3px #000;}

.minions{overflow-y:auto;}
.minions::-webkit-scrollbar {
    display: none;
}

#boots{opacity:0.3;background: url("./gear_Boots.png");}
#armor{opacity:0.3;background: url("./gear_Armor.png");}
#helm{opacity:0.3;background: url("./gear_Helm.png");}
#gaunlet{opacity:0.3;background: url("./gear_Gaunlet.png");}
#ring{opacity:0.3;background: url("./gear_Ring.png");}
#sword{opacity:0.3;background: url("./gear_Sword.png");}

.q0{border:solid 1px #333; !important}
.q1{border:solid 1px #666; !important}
.q2{border:solid 1px #04A3E4; !important}
.q3{border:solid 1px #cFcF14; !important}
.q4{border:solid 1px #D107FF; !important}
.q5{border:solid 1px #FF3C35; !important}
.q6{border:solid 1px #FFA347; !important}


#q1{color:#bbb;}
#q2{color:#04A3E4;}
#q3{color:#cFcF14;}
#q4{color:#D107FF;}
#q5{color:#FF3C35;}
#q6{color:#FFA347;}


.hr{width:330px;height:1px;background:#333;position:absolute;top:250px;}
#sort{text-decoration:none;position: absolute;bottom:8px;right:8px}
#sort:hover{cursor:pointer;text-decoration:underline;}

.meglio{color:#3CeF65;}
.neutro{color:#999;}
.peggio{color:#eF4C55;}

.potGold{color:#fc6565;}
.potDiams{color:#cca943;}
.potEff{color:#fC3Fe5;}
.potMf{color:#4C8Ff5;}
.potExp{color:#3CeF65;}



  </style>
</head>
<body>
  <div class="main">
  <img src="logo.png">
  <br><br><br>
    <span id="mainPanel"></span>
  </div>
  <div class="gear">
    <h2>Gear</h2><br>
    <div class="invslot"><span id="boots" class="q0"></span><span id="armor" class="q0"></span><span id="helm" class="q0"></span><span id="gaunlet" class="q0"></span><span id="ring" class="q0"></span><span id="sword" class="q0"></span></div>
    <span id="gearPanel"></span>
<!--  </div>
  <br>
  <div class="inventory"> -->
  <div class="hr"></div>
    <div class="div"><h2>Inventory</h2><small>(double left-click to equip/use,right-click to sell/use)</small></div>
    <div class="slots">

    </div>
    <div class="div"><a href="#" id="invleft"><</a> <span id="invnav"></span> <a href="#" id="invright">></a><span id="sort">sort</span><br><br></div>

  </div>

  <div class="minions">
    <div class="div"><h2>Title</h2><small>Sub-Title</small></div><br><br><br><br>
    <div class="list">

    </div>
  </div>

  <script src="./jquery.min.js"></script>
  <script src="./jquery.timer.js"></script>
  <script src="./jquery.tooltipster.min.js"></script>
  <script src="./jquery.mCustomScrollbar.concat.min.js"></script>

  <script>
  $(window).load(function(){
    $(".minions").mCustomScrollbar({
      axis:"y",
      theme: "minimal"
    });
  });

  var username='xenoma';
  var wins=losses=0;
  var exp=100,level=credits=0,expmax=888;
  var expps=1,goldps=1,diamsps=0.1,mf=0.5,clickeff=5;
  var gear_expps=0,gear_goldps=0,gear_diamsps=0,gear_mf=0,gear_clickeff=0;
  var d=h=m=s=0;
  var multiGold=multiDiam=multiExp=multiMf=multiEff=1;
  //gold, diams, eff, mf, exp
  var timerPozioni = new Array(0,0,0,0,0);

  var invpage=1,invmaxpages=20;
  var invArray = new Array();

  var gearArray = new Array();
  gearArray[0] = new Array(-1,0,0,0,0,0,0,0);
  gearArray[1] = new Array(-1,0,0,0,0,0,0,0);
  gearArray[2] = new Array(-1,0,0,0,0,0,0,0);
  gearArray[3] = new Array(-1,0,0,0,0,0,0,0);
  gearArray[4] = new Array(-1,0,0,0,0,0,0,0);
  gearArray[5] = new Array(-1,0,0,0,0,0,0,0);

  initInventario();//inizializza l'array dell'inventario
  updateInventario();//aggiorna il contenuto dell'inventario (grafico)

  initGears();

  downloadInfo();
  downloadGear();
  downloadInventario();
  //runtimeLoop();

  var mainpanel=potpanel=plurale='';
  updateMainPanel();


  function initGears(){
      $('#boots').tooltipster({content: $('<i>Empty slot</i>'),contentAsHTML:true});
      $('#armor').tooltipster({content: $('<i>Empty slot</i>'),contentAsHTML:true});
      $('#helm').tooltipster({content: $('<i>Empty slot</i>'),contentAsHTML:true});
      $('#gaunlet').tooltipster({content: $('<i>Empty slot</i>'),contentAsHTML:true});
      $('#ring').tooltipster({content: $('<i>Empty slot</i>'),contentAsHTML:true});
      $('#sword').tooltipster({content: $('<i>Empty slot</i>'),contentAsHTML:true});
  }


//DA TENERE (tutte le azioni grafiche)

function initInventario(){
  //grafica
  var inv='';
  for (var i = 0; i < 64; i++) {
    inv+='<span class="slot" id="s'+(i)+'"></span>';
  };
  $('.slots').html(inv);
  //add tooltip
  for (var i = 0; i < 64; i++) {
    $('#s'+i).tooltipster({content: $('<i>Empty slot</i>'),contentAsHTML:true});
  }
  //logica
  for (var i = 0; i < 64*invmaxpages; i++) {
    //array inv: [tipo][tipo][rar][enanchement][lvl][goldps][diamsps][eff][mf][expps]
    invArray[i] = new Array(-1,0,0,0,0,0,0,0,0,0);
  };
}
function updateInventario(){
  var inv='';
  for (var i = 0; i < 64; i++) {
    //$('#s'+i).html(invArray[i+64*(invpage-1)][0]);
    q=invArray[i+64*(invpage-1)][2]+1;
    t=invArray[i+64*(invpage-1)][1];
    setInvIcon(i,q,t);
  };
  $('#invnav').html('<small>Page '+invpage+'/'+invmaxpages+' </small>');
}




function downloadInfo(){
  $.ajax({
    url: "./getUserInfo.php?username="+username,
    dataType: "JSON",
    success: function(json){
        exp=json[0];expmax=json[1];level=json[2];rank=json[3];wins=json[4];losses=json[5];credits=json[6];
        updateMainPanel();
    }
  });
}function downloadGear(){
  $.ajax({
    url: "./getUserGear.php?username="+username,
    dataType: "JSON",
    success: function(json){
        for(var i=0;i<6;i++){
          gearArray[i] = new Array(json[i][0],json[i][1],json[i][2],json[i][3],json[i][4],json[i][5],json[i][6],json[i][7]);
          timerPozioni[i] = json[6][i];
          updateGearSlots(i);
        }
        updateGearPanel();
    }
  });
}function downloadInventario(){
  $.ajax({
    url: "./getUserInv.php?username="+username,
    dataType: "JSON",
    success: function(json){
        for(var i=0;i<64*invmaxpages;i++){
            invArray[i] = [json[i][0],json[i][1],json[i][2],json[i][3],json[i][4],json[i][5],json[i][6],json[i][7],json[i][8],json[i][9]];
        }updateInventario();
    }
  });
}





function setInvIcon(i,q,t){
  if(invArray[i+64*(invpage-1)][0]==-1){//empty
    $('#s'+i).removeClass("q6 q1 q2 q3 q4 q5").addClass("q0");
    $('#s'+i).css({'background':'url("./inv_empty.png")'});
    $('#s'+i).tooltipster('content','<i>empty slot</i>');
  }else if(invArray[i+64*(invpage-1)][0]==2){//oggetto
    $('#s'+i).removeClass("q0 q1 q2 q3 q4 q5 q6").addClass("q"+q);
    tipo='';
    switch(t){
      case 0: tipo='Boots'; break;
      case 1: tipo='Armor'; break;
      case 2: tipo='Helm'; break;
      case 3: tipo='Gaunlet'; break;
      case 4: tipo='Ring'; break;
      case 5: tipo='Sword'; break;
    }rar='';
    switch(q-1){
      case 0: rar='Common'; break;
      case 1: rar='Magic'; break;
      case 2: rar='Rare'; break;
      case 3: rar='Epic'; break;
      case 4: rar='Legendary'; break;
      case 5: rar='Unique'; break;
    }
    $('#s'+i).css({'background':'url("./inv_'+tipo+'.png")'});

    var diffe=pDD(invArray[i+64*(invpage-1)][5]-gearArray[t][3]);
    if(diffe>0)colores='meglio">(+'+scala(diffe)+')';else if(diffe<0)colores='peggio">('+scala(diffe)+')';else colores='neutro">';

    stats='';
    stats+='Atk: '+scala(invArray[i+64*(invpage-1)][5])+' <span class="'+colores+'</span><br>';
    diffe=invArray[i+64*(invpage-1)][6]-gearArray[t][4];
    if(diffe>0)colores='meglio">(+'+scala(diffe)+')';else if(diffe<0)colores='peggio">('+scala(diffe)+')';else colores='neutro">';
    stats+='Def: '+scala(invArray[i+64*(invpage-1)][6])+' <span class="'+colores+'</span><br>';
    diffe=invArray[i+64*(invpage-1)][7]-gearArray[t][5];
    if(diffe>0)colores='meglio">(+'+scala(diffe)+'%)';else if(diffe<0)colores='peggio">('+scala(diffe)+'%)';else colores='neutro">';
    stats+='Crit: '+scala(invArray[i+64*(invpage-1)][7])+'% <span class="'+colores+'</span><br>';
    diffe=invArray[i+64*(invpage-1)][8]-gearArray[t][6];
    if(diffe>0)colores='meglio">(+'+scala(diffe)+'%)';else if(diffe<0)colores='peggio">('+scala(diffe)+'%)';else colores='neutro">';
    stats+='M.Find: '+scala(invArray[i+64*(invpage-1)][8])+'% <span class="'+colores+'</span><br>';
    diffe=invArray[i+64*(invpage-1)][9]-gearArray[t][7];
    if(diffe>0)colores='meglio">(+'+scala(diffe)+')';else if(diffe<0)colores='peggio">('+scala(diffe)+')';else colores='neutro">';
    stats+='Exp: '+scala(invArray[i+64*(invpage-1)][9])+' <span class="'+colores+'</span><br>';

    $('#s'+i).tooltipster('content','<b id="q'+q+'">'+rar+' '+tipo+' +'+invArray[i+64*(invpage-1)][3]+'</b><br><i>Level '+scala(invArray[i+64*(invpage-1)][4])+'</i><br><small>'+stats+'</small>');
  }else if(invArray[i+64*(invpage-1)][0]==1){//pozione small fat awesome 10 20 30
    qual='';q-=1;
    switch(q){
      case 0: qual='Small'; break;
      case 1: qual='Fat'; break;
      case 2: qual='Awesome'; break;
    }
    tipo='';gain='';
    switch(t%5){
      case 0: tipo='magic';gain='magic find'; break;
      case 1: tipo='gold';gain='gold gain'; break;
      case 2: tipo='experience';gain='experience gain'; break;
      case 3: tipo='efficency';gain='mining efficiency'; break;
      case 4: tipo='diamond';gain='diamonds gain'; break;
    }
    $('#s'+i).removeClass("q6 q1 q2 q3 q4 q5").addClass("q0");
    $('#s'+i).css({'background':'url("./pot_'+(t%5)+''+(q)+'.png")'});
    $('#s'+i).css({'background-position':'50% 50%'});
    $('#s'+i).css({'background-size':'110%'});
    plurale='';if((1+(q))>1)plurale='es';
    $('#s'+i).tooltipster('content','<b>'+qual+' '+tipo+' Potion</b><br><i>Increases '+gain+' by 50% for '+((1+(q)))+' match'+plurale+'.</i>');
  }else if(invArray[i+64*(invpage-1)][0]==0){//cassa
    $('#s'+i).removeClass("q6 q1 q2 q3 q4 q5").addClass("q0");
    rar='';
    switch(q-1){
      case 0: rar='Common'; break;
      case 1: rar='Magic'; break;
      case 2: rar='Rare'; break;
      case 3: rar='Epic'; break;
      case 4: rar='Legendary'; break;
      case 5: rar='Unique'; break;
    }
    $('#s'+i).css({'background':'url("./chest'+(q-1)+'.png")'});
    $('#s'+i).css({'background-position':'50% 50%'});
    $('#s'+i).css({'background-size':'110%'});
    $('#s'+i).tooltipster('content','<b id="q'+q+'">'+rar+' Chest</b><br><small><i>Drops 3 pieces of '+rar+' gear<br>and a random potion.</i></small>');
  }
}
$('#invleft').click(function(){
  if(invpage>1){invpage--;updateInventario();}
});
$('#invright').click(function(){
  if(invpage<invmaxpages){invpage++;updateInventario();}
});

function updateGearSlots(gear){
    tipo='';rar='';
    switch(gear){
      case 0: tipo='Boots'; break;
      case 1: tipo='Armor'; break;
      case 2: tipo='Helm'; break;
      case 3: tipo='Gaunlet'; break;
      case 4: tipo='Ring'; break;
      case 5: tipo='Sword'; break;
    }rar='';
    switch(gearArray[gear][0]){
      case 0: rar='Common'; break;
      case 1: rar='Magic'; break;
      case 2: rar='Rare'; break;
      case 3: rar='Epic'; break;
      case 4: rar='Legendary'; break;
      case 5: rar='Unique'; break;
      default: rar='Empty'; break;
    }
    if(gearArray[gear][0]==-1){
        switch(gear){
            case 0: $('#boots').removeClass("q0 q1 q2 q3 q4 q5 q6");$('#boots').css({opacity:0.3}).tooltipster('content','<i>Empty slot</i>'); break;
            case 1: $('#armor').removeClass("q0 q1 q2 q3 q4 q5 q6");$('#armor').css({opacity:0.3}).tooltipster('content','<i>Empty slot</i>'); break;
            case 2: $('#helm').removeClass("q0 q1 q2 q3 q4 q5 q6");$('#helm').css({opacity:0.3}).tooltipster('content','<i>Empty slot</i>'); break;
            case 3: $('#gaunlet').removeClass("q0 q1 q2 q3 q4 q5 q6");$('#gaunlet').css({opacity:0.3}).tooltipster('content','<i>Empty slot</i>'); break;
            case 4: $('#ring').removeClass("q0 q1 q2 q3 q4 q5 q6");$('#ring').css({opacity:0.3}).tooltipster('content','<i>Empty slot</i>'); break;
            case 5: $('#sword').removeClass("q0 q1 q2 q3 q4 q5 q6");$('#sword').css({opacity:0.3}).tooltipster('content','<i>Empty slot</i>'); break;
        }
    }else{
        switch(gear){
            case 0: $('#boots').removeClass("q0 q1 q2 q3 q4 q5 q6").addClass("q"+(gearArray[0][0]+1));$('#boots').css({opacity:1}).tooltipster('content','<b id="q'+(gearArray[gear][0]+1)+'">'+rar+' '+tipo+' +'+gearArray[gear][1]+'</b><br><i>Level '+scala(gearArray[gear][2])+'</i><br><small>Atk: '+scala(gearArray[gear][3])+' <br>Def: '+scala(gearArray[gear][4])+' <br>Crit: '+scala(gearArray[gear][5])+'%<br>M.Find: '+scala(gearArray[gear][6])+'%<br>Exp: '+scala(gearArray[gear][7])+' <br></small>'); break;
            case 1: $('#armor').removeClass("q0 q1 q2 q3 q4 q5 q6").addClass("q"+(gearArray[1][0]+1));$('#armor').css({opacity:1}).tooltipster('content','<b id="q'+(gearArray[gear][0]+1)+'">'+rar+' '+tipo+' +'+gearArray[gear][1]+'</b><br><i>Level '+scala(gearArray[gear][2])+'</i><br><small>Atk: '+scala(gearArray[gear][3])+' <br>Def: '+scala(gearArray[gear][4])+' <br>Crit: '+scala(gearArray[gear][5])+'%<br>M.Find: '+scala(gearArray[gear][6])+'%<br>Exp: '+scala(gearArray[gear][7])+' <br></small>'); break;
            case 2: $('#helm').removeClass("q0 q1 q2 q3 q4 q5 q6").addClass("q"+(gearArray[2][0]+1));$('#helm').css({opacity:1}).tooltipster('content','<b id="q'+(gearArray[gear][0]+1)+'">'+rar+' '+tipo+' +'+gearArray[gear][1]+'</b><br><i>Level '+scala(gearArray[gear][2])+'</i><br><small>Atk: '+scala(gearArray[gear][3])+' <br>Def: '+scala(gearArray[gear][4])+' <br>Crit: '+scala(gearArray[gear][5])+'%<br>M.Find: '+scala(gearArray[gear][6])+'%<br>Exp: '+scala(gearArray[gear][7])+' <br></small>'); break;
            case 3: $('#gaunlet').removeClass("q0 q1 q2 q3 q4 q5 q6").addClass("q"+(gearArray[3][0]+1));$('#gaunlet').css({opacity:1}).tooltipster('content','<b id="q'+(gearArray[gear][0]+1)+'">'+rar+' '+tipo+' +'+gearArray[gear][1]+'</b><br><i>Level '+scala(gearArray[gear][2])+'</i><br><small>Atk: '+scala(gearArray[gear][3])+' <br>Def: '+scala(gearArray[gear][4])+' <br>Crit: '+scala(gearArray[gear][5])+'%<br>M.Find: '+scala(gearArray[gear][6])+'%<br>Exp: '+scala(gearArray[gear][7])+' <br></small>'); break;
            case 4: $('#ring').removeClass("q0 q1 q2 q3 q4 q5 q6").addClass("q"+(gearArray[4][0]+1));$('#ring').css({opacity:1}).tooltipster('content','<b id="q'+(gearArray[gear][0]+1)+'">'+rar+' '+tipo+' +'+gearArray[gear][1]+'</b><br><i>Level '+scala(gearArray[gear][2])+'</i><br><small>Atk: '+scala(gearArray[gear][3])+' <br>Def: '+scala(gearArray[gear][4])+' <br>Crit: '+scala(gearArray[gear][5])+'%<br>M.Find: '+scala(gearArray[gear][6])+'%<br>Exp: '+scala(gearArray[gear][7])+' <br></small>'); break;
            case 5: $('#sword').removeClass("q0 q1 q2 q3 q4 q5 q6").addClass("q"+(gearArray[5][0]+1));$('#sword').css({opacity:1}).tooltipster('content','<b id="q'+(gearArray[gear][0]+1)+'">'+rar+' '+tipo+' +'+gearArray[gear][1]+'</b><br><i>Level '+scala(gearArray[gear][2])+'</i><br><small>Atk: '+scala(gearArray[gear][3])+' <br>Def: '+scala(gearArray[gear][4])+' <br>Crit: '+scala(gearArray[gear][5])+'%<br>M.Find: '+scala(gearArray[gear][6])+'%<br>Exp: '+scala(gearArray[gear][7])+' <br></small>'); break;
        }
    }
}

function updateSlotInv(i){
  q=invArray[i][2]+1;
  t=invArray[i][1];
  setInvIcon(i-64*(invpage-1),q,t);
}

function getGearStats(i){//le stats vengono scaricate tramite php negli array
  i+=2;
  var tota=0;
  var tipi=6;
  switch(i){
    case 2: while(tipi>0)tota+=gearArray[--tipi][i];tota/=6;break;
    default: while(tipi>0)tota+=gearArray[--tipi][i];break;
  }
  return tota;
}
function updateGearPanel(){
  gear_goldps=    getGearStats(1);
  gear_diamsps=   getGearStats(2);
  gear_clickeff=  getGearStats(3);
  gear_mf=        getGearStats(4);
  gear_expps=     getGearStats(5);
  potpanel='';
  //potion timers
  if(timerPozioni[1]>0){
  multiGold=2;
    potpanel+='<span class="potGold">'+scala(gear_goldps*2)+'</span><span class="neutro"> ['+scala(timerPozioni[1])+']</span><br>';
  }else if(timerPozioni[1]<0){
    timerPozioni[1]=0;
    potpanel+='<span>'+scala(gear_goldps)+'</span><br>';
  }else{potpanel+='<span>'+scala(gear_goldps)+'</span><br>';multiGold=1;}

  if(timerPozioni[4]>0){
  multiDiam=2;
    potpanel+='<span class="potDiams">'+scala(gear_diamsps*2)+'</span><span class="neutro"> ['+scala(timerPozioni[4])+']</span><br>';
  }else if(timerPozioni[4]<0){
    timerPozioni[4]=0;
    potpanel+='<span>'+scala(gear_diamsps)+'</span><br>';
  }else{potpanel+='<span>'+scala(gear_diamsps)+'</span><br>';multiDiam=1;}

  if(timerPozioni[3]>0){
  multiEff=2;
    potpanel+='<span class="potEff">'+scala(gear_clickeff*2)+'%</span><span class="neutro"> ['+scala(timerPozioni[3])+']</span><br>';
  }else if(timerPozioni[3]<0){
    timerPozioni[3]=0;
    potpanel+='<span>'+scala(gear_clickeff)+'%</span><br>';
  }else{potpanel+='<span>'+scala(gear_clickeff)+'%</span><br>';multiEff=1;}

  if(timerPozioni[0]>0){
      multiMf=2;
    potpanel+='<span class="potMf">'+scala(gear_mf)+'%</span><span class="neutro"> ['+scala(timerPozioni[0])+']</span><br>';
  }else if(timerPozioni[0]<0){
    timerPozioni[0]=0;
    potpanel+='<span>'+scala(gear_mf)+'%</span><br>';
  }else{potpanel+='<span>'+scala(gear_mf)+'%</span><br>';multiMf=1;}

  if(timerPozioni[2]>0){
      multiExp=2;
      potpanel+='<span class="potExp">'+scala(gear_expps*2)+'</span><span class="neutro"> ['+scala(timerPozioni[2])+']</span><br>';
  }else if(timerPozioni[2]<0){
    timerPozioni[2]=0;
    potpanel+='<span>'+scala(gear_expps)+'</span><br>';
  }else{potpanel+='<span>'+scala(gear_expps)+'</span><br>';multiExp=1;}
  $('#gearPanel').html('<div class="div"><br><h3>Gear Stats</h3></div><br><br><div class="subpanelL"><p>Level:</p><p>Attack:</p><p>Defense:</p><p>Critical Chance:</p><p>Magic Find:</p><p>Exp Gain:</p></div><div class="subpanelR"><span>'+scala(getGearStats(0))+'</span><br>'+potpanel+'<br><br></div>');
}

function updateMainPanel(){
  mainpanel='<div id="username">'+username+'</div><br><progress id="progressbar" value="'+exp+'" max="'+expmax+'"></progress><div id="level">Level '+scala(level)+' - Exp: '+scala(parseInt(exp))+'/'+scala(expmax)+'</div><div class="subpanelL"><p>rank: </p><p>credits: </p><p>wins/losses: </p></div><div class="subpanelR"><span>'+scala(0)+'</span><br><span>'+scala(credits)+'</span><br><span>'+scala(wins)+'/'+scala(losses)+'</span><br><br>';
  $('#mainPanel').html(mainpanel+'<br></div>');
}




function scala(num){
  if(num < 1e3)         return pDD(num);
  else if(num >= 1e39)  return pDD(num/1e39) + " Duodecillions";
  else if(num >= 1e36)  return pDD(num/1e36) + " Undecillions";
  else if(num >= 1e33)  return pDD(num/1e33) + " Decillions";
  else if(num >= 1e30)  return pDD(num/1e30) + " Nonillions";
  else if(num >= 1e27)  return pDD(num/1e27) + " Octillions";
  else if(num >= 1e24)  return pDD(num/1e24) + " Septillions";
  else if(num >= 1e21)  return pDD(num/1e21) + " Sextillions";
  else if(num >= 1e18)  return pDD(num/1e18) + " Quintillions";
  else if(num >= 1e15)  return pDD(num/1e15) + " Quadrillions";
  else if(num >= 1e12)  return pDD(num/1e12) + " T";
  else if(num >= 1e9)   return pDD(num/1e9) + " B";
  else if(num >= 1e6)   return pDD(num/1e6) + " M";
  else if(num >= 1e3)   return pDD(num/1e3) + " K";
}function pDD(num){//tieni solo 2 cifre decimali - parsaDueDecimali
  return Math.floor(100*num)/100;
}
//right click disabled
$('html').bind('contextmenu', function(){
      return false;
});


function getUserData() {
  //viene chiamata anche durante l'init!!!
  //get(userdata.php) //restituisce un json con i dati da mettere nelle var/array del js
}
function invDoubleClick(i){
  //send php?slot=i
  //in base al return aggiorna solo una parte dell'interfaccia (oppure aggiorna tutto?):
  // - cassa: tutto l'inv
  // - pozione: slot + gearpanel
  // - gear: slot + gearpanel

  // - per il refine (altra funzione invRightClick(i); ): slot + mainpanel(i credits)
}
//DA PHPiZZARE
$('.slot').dblclick(function(){//funzione che opera su un solo slot (non scarica tutto l'inv ma solo uno slot)

  id=parseInt((this.id).substring(1));
  i=id+64*(invpage-1);

  invDoubleClick(i);

  if(invArray[i][0]==-1){//empty
  }else if(invArray[i][0]==2){//oggetto
    $.ajax({
      url: "./dbl.php?u="+username+"&s="+i,
      success: function(){
              gear_goldps=0;
              gear_diamsps=0;
              gear_clickeff=0;
              gear_mf=0;
              gear_expps=0;
          downloadGear();
          downloadInventario();
      }
    });

  }else if(invArray[i][0]==1){//pozione small fat awesome 10 20 30
    //atk, def, eff, mf, exp
    $.ajax({
        url: "./dbl.php?u="+username+"&s="+i,
        success: function(){
            downloadGear();
            downloadInventario();
        }
    });
  }else if(invArray[i][0]==0){//cassa
      $.ajax({
        url: "./dbl.php?u="+username+"&s="+i+"&l="+level,
        success: function(){
            downloadInventario();
        }
      });
    /*invArray[i][0]=-1;
    rarchest=invArray[i][2];
    dropGear(rarchest);
    dropGear(rarchest);
    dropGear(rarchest);
    dropPotion();
    updateInventario();*/
  }
});


$('#sort').click(function(){
    $.ajax({
      url: "./sort.php?u="+username,
      dataType: "JSON",
      success: function(json){
          for(var i=0;i<64*invmaxpages;i++){
              invArray[i] = [json[i][0],json[i][1],json[i][2],json[i][3],json[i][4],json[i][5],json[i][6],json[i][7],json[i][8],json[i][9]];
          }updateInventario();
      }
    });
});


function drop(){
  tipo=rar=0;
  tipo=Math.floor((Math.random()*9));
  if(tipo==0){//cassa
    dropChest(getRar());
  }else if(tipo<3){//pozione
    dropPotion();
  }else{//gear
    dropGear(getRar());
  }
}
function getRar(){
  rar=Math.floor((Math.random()*3600));
  if(rar<3)         rar=5;
  else if(rar<40)   rar=4;
  else if(rar<180)  rar=3;
  else if(rar<560)  rar=2;
  else if(rar<1500) rar=1;
  else              rar=0;
  return rar;
}
function dropPotion(){
  i=rar=0;
  while(i<invArray.length){
    if(invArray[i][0]==-1){
        invArray[i][0]=1;
        invArray[i][1]=Math.floor((Math.random()*5));//tipo di pozione
        rar=Math.floor((Math.random()*100));
        if(rar<10)        invArray[i][2]=2;
        else if(rar<35)   invArray[i][2]=1;
        else              invArray[i][2]=0;
        break;
    }i++;
  }updateSlotInv(i);
}
function dropChest(rar){
  i=0;
  while(i<invArray.length){
    if(invArray[i][0]==-1){
        invArray[i][0]=0;
        invArray[i][2]=rar;
        break;
    }i++;
  }updateSlotInv(i);
}
function dropGear(rar){
  i=0;
    //              0     1    2        3        4     5        6      7    8    9
    //array inv: [tipo][tipo][rar][enanchement][lvl][goldps][diamsps][eff][mf][expps]
  while(i<invArray.length){
    if(invArray[i][0]==-1){
        invArray[i][0]=2;//gear_code
        invArray[i][1]=Math.floor((Math.random()*6));//tipo di gear
        invArray[i][2]=rar;//rarità
        invArray[i][3]=0;//enanchement
        invArray[i][4]=Math.floor((Math.random()*level)+1);//lvl
        invArray[i][5]=pDD(((((Math.random()*16*invArray[i][4])+16+10*(invArray[i][4]-1))*Math.pow(1.1,invArray[i][4])/16)*((rar+1)+invArray[i][3])));//goldps
        invArray[i][6]=pDD(((((Math.random()*16*invArray[i][4])+16+10*(invArray[i][4]-1))*Math.pow(1.1,invArray[i][4])/16)*((rar+1)+invArray[i][3])));//diamsps

        invArray[i][7]=pDD((10/(11-invArray[i][3]))/(7-invArray[i][2]));//eff max_eff=60% (max 10% per gear)
        if(invArray[i][7]>10)invArray[i][7]=10;
        invArray[i][8]=pDD((10/(11-invArray[i][3]))/(7-invArray[i][2]));//mf max_mf=60% (max 10% per gear)
        if(invArray[i][8]>10)invArray[i][8]=10;
        invArray[i][9]=2;//expps
        break;
      }i++;
  }updateSlotInv(i);
}
function levelUP(){//implementare anche la parte grafica con la barra che scorre!
  exp=0;
  expmax=parseInt(expmax*1.25);
  level++;
}

$('.slot').bind('contextmenu', function(){//REFINE
      i=parseInt((this.id).substring(1));
      if(invArray[i+64*(invpage-1)][0]==2){//gear
        credits+=100*(invArray[i+64*(invpage-1)][2]*invArray[i+64*(invpage-1)][4]+1);
        invArray[i+64*(invpage-1)][0]=-1;
        updateSlotInv(i+64*(invpage-1));
      updateMainPanel();
      }else if(invArray[i+64*(invpage-1)][0]==1){//pozione small fat awesome 10 20 30
        //gold, diams, eff, mf, exp
        timerPozioni[invArray[i][1]]+=(invArray[i][2]+1);
        invArray[i+64*(invpage-1)][0]=-1;
        updateSlotInv(i+64*(invpage-1));
        updateGearPanel();
      }else if(invArray[i+64*(invpage-1)][0]==0){//cassa
        invArray[i+64*(invpage-1)][0]=-1;
        rarchest=invArray[i+64*(invpage-1)][2];
        dropGear(rarchest);
        dropGear(rarchest);
        dropGear(rarchest);
        dropPotion();
      }return false;
});


//ancora da classificare


    //                      0       1       2       3     4         5   6     7
//array inv: [tipo][tipo][rar][enanchement][lvl][goldps][diamsps][eff][mf][expps]

/*
dropChest(0);
dropChest(1);
dropChest(2);
dropChest(3);
dropChest(4);
dropChest(5);
*/

    //                      0       1       2       3     4         5   6     7
//array inv: [tipo][tipo][rar][enanchement][lvl][goldps][diamsps][eff][mf][expps]


//main timer loop
var timer = $.timer(function() {
  ciclo();
}, 200, true);
var timer = $.timer(function() {
  cicloSecondo();
}, 1000, true);
function ciclo(){
    updateMainPanel();updateGearPanel();
    update();
    updateUpIcons();

    mf=calcMf();

    if(exp>=expmax){levelUP();}
//drop();
    //document.title = scala(gold);
}function cicloSecondo(){
  if(Math.random()*100<mf) drop();
}


function profitExp(){
  return (1+getGearStats(5))*multiExp;
}
function calcMf(){
  return (0.5+getGearStats(4))*multiMf;
}
function calcEff(){
  return (5+getGearStats(3))*multiEff;
}

/*
//get real time when hidden
$(window).blur(function(){
  timer.pause();
  before = new Date();
});
$(window).focus(function(){
  timer.play();
  now = new Date();
  elapsedTime = (now.getTime() - before.getTime());
  elapsedTime/=200;
    $('.tempo').text(elapsedTime/5);
  while(elapsedTime>0){
    elapsedTime--;
    ciclo();
  }
});
*/

//window.open("", "", "width=200, height=100");



  </script>

</body>
</html>
