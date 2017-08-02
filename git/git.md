git 
	[--version] 
	[--help] 
	[-C <path>] 
	[-c name=value]
	[--exec-path[=<path>]] 
	[--html-path] 
	[--man-path] 
	[--info-path]
	[-p | --paginate | --no-pager] 
	[--no-replace-objects] 
	[--bare]
	[--git-dir=<path>] 
	[--work-tree=<path>] 
	[--namespace=<name>]
        <command> 
	[<args>]

在 '/usr/lib/git-core' 下可用的 git 命令

  add                       config                    get-tar-commit-id         merge-ours                remote                    stage
  add--interactive          count-objects             grep                      merge-recursive           remote-ext                stash
  am                        credential                hash-object               merge-resolve             remote-fd                 status
  annotate                  credential-cache          help                      merge-subtree             remote-ftp                stripspace
  apply                     credential-cache--daemon  http-backend              merge-tree                remote-ftps               submodule
  archive                   credential-store          http-fetch                mergetool                 remote-http               submodule--helper
  bisect                    daemon                    http-push                 mktag                     remote-https              subtree
  bisect--helper            describe                  imap-send                 mktree                    remote-testsvn            symbolic-ref
  blame                     diff                      index-pack                mv                        repack                    tag
  branch                    diff-files                init                      name-rev                  replace                   unpack-file
  bundle                    diff-index                init-db                   notes                     request-pull              unpack-objects
  cat-file                  diff-tree                 instaweb                  pack-objects              rerere                    update-index
  check-attr                difftool                  interpret-trailers        pack-redundant            reset                     update-ref
  check-ignore              difftool--helper          log                       pack-refs                 rev-list                  update-server-info
  check-mailmap             fast-export               ls-files                  patch-id                  rev-parse                 upload-archive
  check-ref-format          fast-import               ls-remote                 prune                     revert                    upload-pack
  checkout                  fetch                     ls-tree                   prune-packed              rm                        var
  checkout-index            fetch-pack                mailinfo                  pull                      send-pack                 verify-commit
  cherry                    filter-branch             mailsplit                 push                      sh-i18n--envsubst         verify-pack
  cherry-pick               fmt-merge-msg             merge                     quiltimport               shell                     verify-tag
  clean                     for-each-ref              merge-base                read-tree                 shortlog                  web--browse
  clone                     format-patch              merge-file                rebase                    show                      whatchanged
  column                    fsck                      merge-index               receive-pack              show-branch               worktree
  commit                    fsck-objects              merge-octopus             reflog                    show-index                write-tree
  commit-tree               gc                        merge-one-file            relink                    show-ref

命令 'git help -a' 和 'git help -g' 显示可用的子命令和一些概念帮助。
查看 'git help <命令>' 或 'git help <概念>' 以获取给定子命令或概念的
帮助。

