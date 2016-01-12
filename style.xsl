<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:output method="html" indent="yes" version="4.0" doctype-public="-//W3C//DTD HTML 4.01//EN" doctype-system="http://www.w3.org/TR/html4/strict.dtd"/>
  
  <xsl:template match="/">
<table border="1">
	<tr>
		<th>Item Number</th>
		<th>Name</th>
		<th>Category</th>
		<th>Description</th>
		<th>Reserve Price</th>
		<th>Buy It Now Price</th>
		<th>Current Bid Price</th>
		<th>Start Date</th>
		<th>Start Time</th>
		<th>Status</th>
	</tr>
	<xsl:for-each select="//item[status='SOLD' or status='FAILED']">
	<tr>
		<td><xsl:value-of select="itemid"/></td>
		<td><xsl:value-of select="itemname"/></td>
		<td><xsl:value-of select="category"/></td>
		<td><xsl:value-of select="description"/></td>
		<td><xsl:value-of select="reserveprice"/></td>
		<td><xsl:value-of select="buyitnowprice"/></td>
		<td><xsl:value-of select="bidprice"/></td>
		<td><xsl:value-of select="startdate"/></td>
		<td><xsl:value-of select="starttime"/></td>
		<td><xsl:value-of select="status"/></td>
	</tr>
	</xsl:for-each>
</table>
		<p>Revenue from sold items:<xsl:value-of select=".03*sum(//item[status='SOLD']/bidprice)"/></p>
		<p>Revenue from failed items:<xsl:value-of select=".01*sum(//item[status='FAILED']/reserveprice)"/></p>
		<p>Total Revenue is:<xsl:value-of select="(0.03*sum(//item[status='SOLD']/bidprice))+(0.01*sum(//item[status='FAILED']/reserveprice))"/></p>
  </xsl:template>
</xsl:stylesheet>
<!-- Reference:  http://www.w3schools.com/php
						 https://www.youtube.com/
						 http://stackoverflow.com/
						 http://www.tutorialspoint.com/php/
			-->