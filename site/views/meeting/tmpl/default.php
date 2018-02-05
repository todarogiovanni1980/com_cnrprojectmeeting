<?php
/**
 * @version    CVS: 2.4
 * @package    Com_Cnrprojectmeeting
 * @author     Todaro Giovanni <giovanni.todaro@itd.cnr.it>
 * @copyright  Copyright (C) 2014. Tutti i diritti riservati.
 * @license    GNU General Public License versione 2 o successiva; vedi LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

$canEdit = JFactory::getUser()->authorise('core.edit', 'com_cnrprojectmeeting.' . $this->item->id);

if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_cnrprojectmeeting' . $this->item->id))
{
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>

<?php if ( $this->params->get('show_page_heading')!=0) : ?>
    <h1>
<?php echo $this->escape($this->params->get('page_heading')); ?>
    </h1>
<?php endif; ?>

<h2>
  <?php echo $this->item->title; ?>
</h2>

<h3>
  <?php $datefrom = date_create($this->item->startdate);
  		$dateto = date_create($this->item->enddate);
  		echo date_format($datefrom, 'jS ') ."-". date_format($dateto, 'jS F Y'); ?>
</h3>



<div class="item_fields">

	<table class="table">


		<tr>
			<th><?php echo JText::_('COM_CNRPROJECTMEETING_FORM_LBL_MEETING_TITLE'); ?></th>
			<td><?php echo $this->item->title; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CNRPROJECTMEETING_FORM_LBL_MEETING_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CNRPROJECTMEETING_FORM_LBL_MEETING_STARTDATE'); ?></th>
			<td><?php echo $this->item->startdate; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CNRPROJECTMEETING_FORM_LBL_MEETING_ENDDATE'); ?></th>
			<td><?php echo $this->item->enddate; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CNRPROJECTMEETING_FORM_LBL_MEETING_HOST'); ?></th>
			<td><?php echo $this->item->host; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CNRPROJECTMEETING_FORM_LBL_MEETING_LOCATION'); ?></th>
			<td><?php echo $this->item->location; ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CNRPROJECTMEETING_FORM_LBL_MEETING_DESCRIPTION'); ?></th>
			<td><?php echo nl2br($this->item->description); ?></td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CNRPROJECTMEETING_FORM_LBL_MEETING_PHOTOGALLERY'); ?></th>
			<td><?php if ($this->item && $this->item->state == 1 && $this->item->photogallery)
				{
                  $file = explode("/", $this->item->photogallery);
                  $text = "{gallery}meetings/".$file[2]."{/gallery}";
                  $text = JHtml::_('content.prepare', $text);
				} else {
  					?>
              		<blockquote>
                      Nessuna foto caricata...
              		</blockquote>
              		<!-- Inizio integrazione galleria fotografica facebook -->
                    <div id="fb-root"></div><script>(function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v2.3";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script><div class="fb-post" data-href="https://www.facebook.com/media/set/?set=a.988540904527137.1073741833.862498537131375&amp;type=3" data-width="500"><div class="fb-xfbml-parse-ignore"></div></div>

                    <!-- Fine integrazione galleria fotografica facebook -->
	              <?php
				}

                echo $text; ?>


    		</td>
		</tr>

		<tr>
			<th><?php echo JText::_('COM_CNRPROJECTMEETING_FORM_LBL_MEETING_AGENDA'); ?></th>
			<td>
			<?php
			foreach ((array) $this->item->agenda as $singleFile) :
				if (!is_array($singleFile)) :
					$uploadPath = 'uploads' . DIRECTORY_SEPARATOR . $singleFile;
					 echo '<a href="' . JRoute::_(JUri::root() . $uploadPath, false) . '" target="_blank">' . $singleFile . '</a> ';
				endif;
			endforeach;
		?></td>
		</tr>

	</table>

</div>

<?php if($canEdit && $this->item->checked_out == 0): ?>

	<a class="btn" href="<?php echo JRoute::_('index.php?option=com_cnrprojectmeeting&task=meeting.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_CNRPROJECTMEETING_EDIT_ITEM"); ?></a>

<?php endif; ?>

<?php if (JFactory::getUser()->authorise('core.delete','com_cnrprojectmeeting.meeting.'.$this->item->id)) : ?>

	<a class="btn btn-danger" href="#deleteModal" role="button" data-toggle="modal">
		<?php echo JText::_("COM_CNRPROJECTMEETING_DELETE_ITEM"); ?>
	</a>

	<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3><?php echo JText::_('COM_CNRPROJECTMEETING_DELETE_ITEM'); ?></h3>
		</div>
		<div class="modal-body">
			<p><?php echo JText::sprintf('COM_CNRPROJECTMEETING_DELETE_CONFIRM', $this->item->id); ?></p>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal">Close</button>
			<a href="<?php echo JRoute::_('index.php?option=com_cnrprojectmeeting&task=meeting.remove&id=' . $this->item->id, false, 2); ?>" class="btn btn-danger">
				<?php echo JText::_('COM_CNRPROJECTMEETING_DELETE_ITEM'); ?>
			</a>
		</div>
	</div>

<?php endif; ?>
