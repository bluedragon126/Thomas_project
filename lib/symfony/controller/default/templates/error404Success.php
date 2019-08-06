<?php decorate_with(dirname(__FILE__).'/defaultLayout.php') ?>

<div class="sfTMessageContainer sfTAlert"> 
  <?php echo image_tag('/sf/sf_default/images/icons/cancel48.png', array('alt' => 'Sidan ej funnen', 'class' => 'sfTMessageIcon', 'size' => '48x48')) ?>
  <div class="sfTMessageWrap">
    <h1>Hoppsan! Sidan kunde inte hittas</h1>
    <h5>Servern returnerade ett 404-svar.</h5>
  </div>
</div>
<dl class="sfTMessageInfo">
  <dt><strong>Skrev du in URL-adressen?</strong></dt>
  <dd>Du kan ha angett en inkorrekt address (URL). V&auml;nliglen kontrollera f&ouml;r att vara s&auml;ker p&aring; att du har f&aring;tt till exakt r&auml;tt stavning, versaler, etc.</dd>

  <dt><strong>F&ouml;ljde du en l&auml;nk fr&aring;n n&aring;gon annan sida p&aring; denna sajt?</strong></dt>
  <dd>Om du n&aring;dde denna sida fr&aring;n n&aring;gon annan del av sajten, v&auml;nligen mejla oss p&aring;  <?php echo mail_to('info@borstjanaren.se') ?> s&aring; vi kan korrigera v&aring;rt misstag.</dd>

  <dt><strong>F&ouml;ljde du en l&auml;nk fr&aring;n n&aring;gon annan  sajt?</strong></dt>
  <dd>Lankar fr&aring;n andra sajter kan ibland vara inaktuella eller felstavade. Meddela oss p&aring; <?php echo mail_to('info@borstjanaren.se') ?> var du kom ifr&aring;n s&aring; kan vi f&ouml;rs&ouml;ka kontakta den andra sajten f&ouml;r att l&ouml;sa problemet.</dd>

  <dt><strong>Nu d&aring;?</strong></dt>
  <dd>
    <ul class="sfTIconList">
      <li class="sfTLinkMessage"><a href="javascript:history.go(-1)">Tillbaka till f&ouml;reg&aring;ende sida</a></li>
      <li class="sfTLinkMessage"><?php echo link_to('G&aring; till B&ouml;rstj&auml;narens hemsida', '@homepage') ?></li>
    </ul>
  </dd>
</dl>
