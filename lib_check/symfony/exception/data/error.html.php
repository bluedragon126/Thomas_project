<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php $path = sfConfig::get('sf_relative_url_root', preg_replace('#/[^/]+\.php5?$#', '', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : (isset($_SERVER['ORIG_SCRIPT_NAME']) ? $_SERVER['ORIG_SCRIPT_NAME'] : ''))) ?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="title" content="symfony project" />
<meta name="robots" content="index, follow" />
<meta name="description" content="symfony project" />
<meta name="keywords" content="symfony, project" />
<meta name="language" content="en" />
<title>symfony project</title>

<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path ?>/sf/sf_default/css/screen.css" />
<!--[if lt IE 7.]>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $path ?>/sf/sf_default/css/ie.css" />
<![endif]-->

</head>
<body>
<div class="sfTContainer">
  <a title="symfony website" href="http://www.symfony-project.org/"><img alt="symfony PHP Framework" class="sfTLogo" src="<?php echo $path ?>/sf/sf_default/images/sfTLogo.png" height="39" width="186" /></a>
  <div class="sfTMessageContainer sfTAlert">
    <img alt="page not found" class="sfTMessageIcon" src="<?php echo $path ?>/sf/sf_default/images/icons/tools48.png" height="48" width="48" />
    <div class="sfTMessageWrap">
      <h1>Hoppsan! Ett fel inträffade.</h1>
      <h5>Servern returnerade   "<?php echo $code ?> <?php echo $text ?>".</h5>
    </div>
  </div>

  <dl class="sfTMessageInfo">
    <dt><strong>Någonting är trasigt</strong></dt>
    <dd>Vänligen mejla oss på mail_to: info@borstjanaren.se och låt oss veta vad du gjorde när detta fel uppträdde. Vi kommer att lösa det snarast möjligt.
    Ursäkta besväret!</dd>

    <dt><strong>Vad händer nu?</strong></dt>
    <dd>
      <ul class="sfTIconList">
        <li class="sfTLinkMessage"><a href="javascript:history.go(-1)">Tillbaka till f&ouml;reg&aring;ende sida</a></li>
        <li class="sfTLinkMessage"><a href="/">G&aring; till B&ouml;rstj&auml;narens hemsida</a></li>
      </ul>
    </dd>
  </dl>
</div>
</body>
</html>
