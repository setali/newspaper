# Newspaper

<h3> Installation </h3>

Download this module and add in module directory and enable it.

<h3> How to work? </h3>
This module create a vocabulary that named <code>newspaper</code>.<br>
This module crowl data from <code> http://www.jaaar.com/frontpage#!/table/all</code> and create newspaper term every run cron.

<b>Fields:</b>
 <br><code> field_newspaper_id </code>
 <br><code> field_newspaper_nid </code>
 <br><code> field_newspaper_sid </code>
 <br><code> field_newspaper_src </code>
 <br><code> field_newspaper_date </code>
 <br><code> field_newspaper_image </code>
 <br><code> field_show_in_tv </code>
 <br><code> field_show_in_satrab </code>

<b>Route request:</b>
 <br><code> api/newspapers/tv </code> For TV system
 <br><code> api/newspapers/satrab </code> For SATRAB system

<b>Response:</b>
 <br><code>name</code> Example: Lorem ipsum
 <br><code>image</code> Example: Source of image
 
 
