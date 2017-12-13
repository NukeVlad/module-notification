<!-- BEGIN: main -->
<form action="{FORM_ACTION}" method="post">
	<table class="table table-striped table-bordered table-hover">
		<tbody>
			<tr>
				<td>{LANG.notification_config_timeview}</td>
				<td>
				   <select name="timeview" class="form-control">
                        <option value="0">{LANG.notification_config_timeview_0}</option>
                        <!-- BEGIN: timeview -->
                        <option value="{TIMEVIEW.key}"{TIMEVIEW.sl}>{TIMEVIEW.title}</option>
                        <!-- END: timeview -->
                   </select>
				</td>
			</tr>
			<tr>
				<td>{LANG.notification_config_timeout}</td>
				<td><input type="text" class="form-control" name="timeout" value="{DATA.timeout}" /></td>
			</tr>
		</tbody>
	</table>
	<div style="text-align: center; padding-top: 15px">
		<input type="submit" class="btn btn-primary" name="submit" value="{LANG.save}" />
	</div>
</form>
<!-- END: main -->
