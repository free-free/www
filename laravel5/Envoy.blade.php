@servers(['re'=>'root@121.42.169.254','local'=>'root@127.0.0.1'])


@task('list',['on'=>['re','local'],'parallel'=>true,'confirm'=>true])
	ls -alh
@endtask



