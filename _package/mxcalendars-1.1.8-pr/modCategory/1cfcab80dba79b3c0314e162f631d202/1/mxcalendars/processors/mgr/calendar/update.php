<?php
/* UPDATE THE CALENDAR ITEM */

//-- Check for the required calendar ID
if (empty($scriptProperties['id'])) 
	return $modx->error->failure($modx->lexicon('mxcalendars.mxcalendars_err_ns'));

//-- Now check to make sure that the calendar item exist and can be updated
$mxcalendar = $modx->getObject('mxCalendarCalendars',$scriptProperties['id']);
if (empty($mxcalendar)) 
	return $modx->error->failure($modx->lexicon('mxcalendars.mxcalendars_err_nf'));

if(isset($scriptProperties['active']))
    $scriptProperties['active']=1;
else
    $scriptProperties['active']=0;


//-- Set mxcalendar fields
$mxcalendar->fromArray($scriptProperties);
 
//-- Try to update calendar item
if ($mxcalendar->save() == false) {
    return $modx->error->failure($modx->lexicon('mxcalendars.mxcalendars_err_save'));
}

//-- Return success message if no error was found on update (save)
return $modx->error->success('',$mxcalendar);
?>
