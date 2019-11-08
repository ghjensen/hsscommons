<?php
/**
 * @package    hubzero-cms
 * @copyright  Copyright 2005-2019 HUBzero Foundation, LLC.
 * @license    http://opensource.org/licenses/MIT MIT
 */
/**
 * Modified by CANARIE Inc. for the HSSCommons project.
 *
 * Summary of changes: Removed affiliated/nonaffiliated option.
 */
// No direct access
defined('_HZEXEC_') or die();

// Modified by CANARIE Inc. Beginning
// replaced two variables with one
$numitems = 0;
// Modified by CANARIE Inc. End

// Did we get any results back?
if ($this->citations)
{
	// Get a needed library
	include_once Component::path('com_citations') . DS . 'helpers' . DS . 'format.php';

	// Set some vars
	// Modified by CANARIE Inc. Beginning
	// replaced two variables with one
	$item = '';
	// Modified by CANARIE Inc. End

	$formatter = new \Components\Citations\Helpers\Format;
	$formatter->setTemplate($this->format);

	// Loop through the citations and build the HTML
	foreach ($this->citations as $cite)
	{
		$showLinks = ($cite->title && $cite->author && $cite->publisher) ? true : false;
		$formatted = $cite->formatted();

		if ($cite->doi && $cite->url)
		{
			$formatted = str_replace('doi:' . $cite->doi, '<a href="' . $cite->url . '" rel="external">' . 'doi:' . $cite->doi . '</a>', $formatted);
		}

		// Modified by CANARIE Inc. Beginning
		// replaced "=" with ".="
		$item .= "\t" . '<li>' . "\n";
		// Modified by CANARIE Inc. End
		$item .= $formatted;
		$item .= "\t\t" . '<p class="details">' . "\n";
		if ($showLinks)
		{
			$item .= "\t\t\t" . '<a href="' . Route::url('index.php?option=com_citations&task=download&id=' . $cite->id . '&citationFormat=bibtex&no_html=1') . '" title="' . Lang::txt('PLG_PUBLICATION_CITATIONS_DOWNLOAD_BIBTEX') . '">BibTex</a> <span>|</span> ' . "\n";
			$item .= "\t\t\t" . '<a href="' . Route::url('index.php?option=com_citations&task=download&id=' . $cite->id . '&citationFormat=endnote&no_html=1') . '" title="' . Lang::txt('PLG_PUBLICATION_CITATIONS_DOWNLOAD_ENDNOTE') . '">EndNote</a>' . "\n";
		}
		if ($cite->eprint)
		{
			if ($cite->eprint)
			{
				$item .= "\t\t\t" . ' <span>|</span> <a href="' . stripslashes($cite->eprint) . '">' . Lang::txt('PLG_PUBLICATION_CITATIONS_ELECTRONIC_PAPER') . '</a>'."\n";
			}
		}
		$item .= "\t\t" . '</p>' . "\n";
		$item .= "\t" . '</li>' . "\n";

		// Modified by CANARIE Inc. Beginning
		// replaced the code for adding numbers
		$numitems++;
		// Modified by CANARIE Inc. End
	}
}
?>
<h3 id="citations">
	<?php echo Lang::txt('PLG_PUBLICATION_CITATIONS'); ?>
	 <!--  Modified by CANARIE Inc. Beginning -->
     <!--  Replaced how the cited number be displayed -->
     (<?php echo $numitems; ?>)
     <!--  Modified by CANARIE Inc. End -->
</h3>
<?php if ($this->citations) { ?>
	<!--  Modified by CANARIE Inc. Beginning -->
    <!--  Replaced how the citations results be displayed -->
    <ul class="citations results">
        <?php echo $item; ?>
    </ul>
    <!--  Modified by CANARIE Inc. End -->
<?php } else { ?>
	<p><?php echo Lang::txt('PLG_PUBLICATION_CITATIONS_NO_CITATIONS_FOUND'); ?></p>
<?php }
