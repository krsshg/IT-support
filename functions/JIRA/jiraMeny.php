<?php
  include $_SERVER["DOCUMENT_ROOT"] . "/functions/includes/session.php";
  include $_SERVER["DOCUMENT_ROOT"] . "/functions/start.php";



?>
<body>

  <div class="container">

  <div class="jumbotron">
    <img src="../../img/Elkem corporate logo.png" width="190px" height="90px"/>
    <div align="center">
      <h2> JIRA Toolbox</h2>
        <hr><br>

  <div class = "utlaanButtonsAlignCenter">

        <button type=button id="linemanager" onclick="btnTglLinemgr()">Send påminnelse til Line Manager</button>
        <br>
        <div style="display:none" id=mailData>
          <div class="tilgjengeligPC">
            <?php include 'sendMailUMeny.php'; ?>
          </div>
        </div>
        <br>
<!--
        <button type=button id="linemanager" onclick="btnTglLDAPtest()">LDAP testing</button>
<br>
        <div style="display:none" id=LDAP>
        <div class="tilgjengeligPC">
          <?php //include '../LDAP/ldapTest.php'; ?>
        </div>
      </div>
-->

    </div><!--utlaanButtonsAlignCenter-->


  </div>
  </div>
</div> <!-- /container -->
<script>
function btnTglLinemgr() {
    var x = document.getElementById("mailData");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function btnTglLDAPtest() {
    var x = document.getElementById("LDAP");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

</script>


</body>
