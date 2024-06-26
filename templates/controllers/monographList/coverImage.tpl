{**
 * templates/controllers/monographList/coverImage.tpl
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2003-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * Loads the passed monograph cover image thumbnail, defining the correct image dimensions.
 * If the monograph has no image, then it defines the dimensions of the OMP default monograph
 * cover image.
 *}

{assign var=coverImage value=$monograph->getCurrentPublication()->getData('coverImage')}
{if empty($coverImage)}
	{assign var=coverImageWidth value="103"}
	{assign var=coverImageHeight value="100"}
{else}
	{assign var=coverImageWidth value=$coverImage.thumbnailWidth}
	{assign var=coverImageHeight value=$coverImage.thumbnailHeight}
{/if}
<img class="pkp_catalog_monograph_thumbnail pkp_helpers_container_center" height="{$coverImageHeight}" width="{$coverImageWidth}" alt="{$monograph->getLocalizedFullTitle()|strip_tags|escape}" src="{url router=PKP\core\PKPApplication::ROUTE_COMPONENT component="submission.CoverHandler" op="thumbnail" submissionId=$monograph->getId() random=$monograph->getId()|uniqid}" />
