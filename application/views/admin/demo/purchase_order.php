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

  if (is_array($po) ){
    $page = array_slice($po, $iDisplayStart, $iDisplayLength);
    foreach($page as $ud) {
      $onclick = "cae_po('".$ud->pur_ord."')";
      $records["data"][] = array(
        '<input class="chk-po" type="checkbox" name="id[]" value="'.$ud->pur_ord.'" onclick="checkPo()">',
        date('d-m-Y',strtotime($ud->pur_ord_date)),
        '<a class="font-blue" data-toggle="modal" style="text-decoration:none;" onclick="'.$onclick.'" id="60C" >'.$ud->pur_ord.'</a>',
        $ud->person_name,
        $ud->statusOrder,
        $ud->user_create,
        $ud->create_date,
        $ud->user_last_edit,
        $ud->edit_date
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