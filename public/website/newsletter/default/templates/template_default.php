<?php
require_once(dirname(__FILE__).'/../helpers/NewsletterHelper.php');
$objHelper = new NewsletterHelper();
$objHelper->setNewsletter($this->setup); 
?>

		<table cellpadding="0" cellspacing="0" border="0" id="Content">
      <tr>
        <td colspan="2"><?php echo $objHelper->getTitle('h1', false); ?></td>
      </tr>
      <tr>
        <td colspan="2"><?php echo $objHelper->getSalutation(); ?></td>
      </tr>
      <tr>
      	<td colspan="2"><?php echo $objHelper->getArticle(); ?></td>
      </tr>
      <?php echo $objHelper->getTextBlocks('220x', '220x', 'img') ?>
    </table>