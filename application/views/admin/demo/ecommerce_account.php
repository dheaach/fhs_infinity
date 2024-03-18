<?php
  /* 
   * Paging
   */

  //var_dump($_POST["selected"]);


  if( is_array($tot) ) {
    foreach($tot as $totUs) {
      $totRec = $totUs->total;
    }
  }

  $iTotalRecords = $totRec;
  $iDisplayLength = intval($_REQUEST['length']);
  $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength; 
  $iDisplayStart = intval($_REQUEST['start']);
  $sEcho = intval($_REQUEST['draw']);
  
  $records = array();
  $records["data"] = array(); 

  $end = $iDisplayStart + $iDisplayLength;
  $end = $end > $iTotalRecords ? $iTotalRecords : $end;

  if( is_array($grp) ) {
    $page = array_slice($grp, $iDisplayStart, $iDisplayLength);
    foreach($page as $ud) {
      $onclick = "cae_account('".$ud->rek_no."')";
      $records["data"][] = array(
        '<input class="chk-account" type="checkbox" name="id[]" value="'.$ud->rek_no.'" onclick="checkAccount()">',
        '<label style="color:white;!important">'.(($ud->rek_type == 2) ? '&emsp;' : (($ud->rek_type == 3) ? '&emsp;&emsp;' : '')).'</label>'.$ud->rek_kode,
        '<label style="color:white;!important">'.(($ud->rek_type == 2) ? '&emsp;' : (($ud->rek_type == 3) ? '&emsp;&emsp;' : '')).'</label><a class="font-blue" data-toggle="modal" style="text-decoration:none;" onclick="'.$onclick.'" id="58C">'.$ud->rek_nama.'</a>',
        '<label style="color:white;!important">'.(($ud->rek_type == 2) ? '&emsp;' : (($ud->rek_type == 3) ? '&emsp;&emsp;' : '')).'</label>'.$ud->rekjen_keterangan,
        $ud->ket1,
      );
    }
  }


  if (isset($_REQUEST["customActionType"]) && $_REQUEST["customActionType"] == "group_action") {
    $records["customActionStatus"] = "OK"; // pass custom message(useful for getting status of group actions)
    $records["customActionMessage"] = "Group action successfully has been completed. Well done!"; // pass custom message(useful for getting status of group actions)
  }

  $records["draw"] = $sEcho;
  $records["recordsTotal"] = $iTotalRecords;
  $records["recordsFiltered"] = $iTotalRecords;
  
  echo json_encode($records);
?>