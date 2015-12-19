
@servers(['re'=>'root@121.42.169.254'])


@task('list',['on'=>'re'])
	ls -alh
@endtask



