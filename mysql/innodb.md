daemon_memcached_enable_binlog		bool/false	Enable on {the master server} to use 'the InnoDB memcached plugin' (daemon_memcached) with the MySQL binary log	
							This option can only be set at server startup. 
							You must also enable (the MySQL binary log) on {the master server} using the --log-bin option
daemon_memcached_engine_lib_name = innodb_engine.so	Specifies the shared library that implements the InnoDB memcached plugin.			 		
daemon_memcached_engine_lib_path = /directory_name	The path of the directory containing the shared library that implements the InnoDB memcached plugin. 
							The default value is NULL, representing the MySQL plugin directory. 
							You should not need to modify this parameter 
							unless specifying a memcached plugin for a different storage engine 
							that is located outside of 'the MySQL plugin directory' 						 
daemon_memcached_option					Used to pass space-separated memcached options to the underlying memcached memory object caching daemon on 
							startup. 
							For example, you might 
								change the port that memcached listens on, 
								reduce the maximum number of simultaneous connections, 
								change the maximum memory size for a key/value pair, or 
								enable debugging messages for the error log. 		
daemon_memcached_r_batch_size								 		
daemon_memcached_w_batch_size
				 		
foreign_key_checks	 	 		 		
ignore-builtin-innodb			 	 		
- Variable: ignore_builtin_innodb	 	 		 		
innodb			 	 	 	 
innodb_adaptive_flushing				 		
innodb_adaptive_flushing_lwm				 		
innodb_adaptive_hash_index				 		
innodb_adaptive_hash_index_parts				 		
innodb_adaptive_max_sleep_delay						 		
innodb_additional_mem_pool_size		bytes:[					The size of a memory pool InnoDB uses to store data dictionary information 
										and other internal data structures. 
						i:2097152,=2M=2*1024^2
						a:4294967295,=4G=4*1024^3
						d:8388608,=8M=8*1024^2
					]		 		
innodb_api_bk_commit_interval				 		
innodb_api_disable_rowlock		bool/OFF					 		
innodb_api_enable_binlog		bool/OFF		 		
innodb_api_enable_mdl			bool/OFF	 		
innodb_api_trx_level				 		
innodb_autoextend_increment				 		
innodb_autoinc_lock_mode				 		
Innodb_available_undo_logs	 	 	 			
innodb_background_drop_list_empty				 		
Innodb_buffer_pool_bytes_data	 	 	 			
Innodb_buffer_pool_bytes_dirty	 	 	 			
innodb_buffer_pool_chunk_size		[					defines the chunk size for InnoDB buffer pool resizing operations
						i:1048576=1M
						a:innodb_buffer_pool_size / innodb_buffer_pool_instances
						d:134217728=128M			 		
innodb_buffer_pool_dump_at_shutdown				 		
innodb_buffer_pool_dump_now				 		
innodb_buffer_pool_dump_pct				 		
Innodb_buffer_pool_dump_status	 	 	 			
innodb_buffer_pool_filename				 		
innodb_buffer_pool_instances				 		
innodb_buffer_pool_load_abort				 		
innodb_buffer_pool_load_at_startup				 		
innodb_buffer_pool_load_now				 		
Innodb_buffer_pool_load_status	 	 	 			
Innodb_buffer_pool_pages_data	 	 	 			
Innodb_buffer_pool_pages_dirty	 	 	 			
Innodb_buffer_pool_pages_flushed	 	 	 			
Innodb_buffer_pool_pages_free	 	 	 			
Innodb_buffer_pool_pages_latched	 	 	 			
Innodb_buffer_pool_pages_misc	 	 	 			
Innodb_buffer_pool_pages_total	 	 	 			
Innodb_buffer_pool_read_ahead	 	 	 			
Innodb_buffer_pool_read_ahead_evicted	 	 	 			
Innodb_buffer_pool_read_ahead_rnd	 	 	 			
Innodb_buffer_pool_read_requests	 	 	 			
Innodb_buffer_pool_reads	 	 	 			
Innodb_buffer_pool_resize_status	 	 	 			
innodb_buffer_pool_size				 		Varies
Innodb_buffer_pool_wait_free	 	 	 			
Innodb_buffer_pool_write_requests	 	 	 			
innodb_change_buffer_max_size				 		
innodb_change_buffering				 		
innodb_change_buffering_debug				 		
innodb_checksum_algorithm				 		
innodb_checksums				 		
innodb_cmp_per_index_enabled				 		
innodb_commit_concurrency				 		
innodb_compress_debug				 		
innodb_compression_failure_threshold_pct				 		
innodb_compression_level				 		
innodb_compression_pad_pct_max				 		
innodb_concurrency_tickets				 		
innodb_create_intrinsic				 	Session	
innodb_data_file_path				 		
Innodb_data_fsyncs	 	 	 			
innodb_data_home_dir				 		
Innodb_data_pending_fsyncs	 	 	 			
Innodb_data_pending_reads	 	 	 			
Innodb_data_pending_writes	 	 	 			
Innodb_data_read	 	 	 			
Innodb_data_reads	 	 	 			
Innodb_data_writes	 	 	 			
Innodb_data_written	 	 	 			
Innodb_dblwr_pages_written	 	 	 			
Innodb_dblwr_writes	 	 	 			
innodb_default_row_format				 		
innodb_disable_resize_buffer_pool_debug				 		
innodb_disable_sort_file_cache				 		
innodb_doublewrite				 		
innodb_fast_shutdown				 		
innodb_fil_make_page_dirty_debug				 		
innodb_file_format				 		
innodb_file_format_check				 		
innodb_file_format_max				 		
innodb_file_per_table				 		
innodb_fill_factor				 		
innodb_flush_log_at_timeout	 	 		 		
innodb_flush_log_at_trx_commit				 		
innodb_flush_method				 		
innodb_flush_neighbors				 		
innodb_flush_sync				 		
innodb_flushing_avg_loops				 		
innodb_force_load_corrupted				 		
innodb_force_recovery				 		
innodb_ft_aux_table				 		
innodb_ft_cache_size				 		
innodb_ft_enable_diag_print				 		
innodb_ft_enable_stopword				 		
innodb_ft_max_token_size				 		
innodb_ft_min_token_size				 		
innodb_ft_num_word_optimize				 		
innodb_ft_result_cache_limit				 		
innodb_ft_server_stopword_table				 		
innodb_ft_sort_pll_degree				 		
innodb_ft_total_cache_size				 		
innodb_ft_user_stopword_table				 		
Innodb_have_atomic_builtins	 	 	 			
innodb_io_capacity				 		
innodb_io_capacity_max				 		
innodb_large_prefix				 		
innodb_limit_optimistic_insert_debug				 		
innodb_lock_wait_timeout				 		
innodb_locks_unsafe_for_binlog				 		
innodb_log_buffer_size				 		
innodb_log_checksum_algorithm				 		
innodb_log_checksums				 		
innodb_log_compressed_pages				 		
innodb_log_file_size				 		
innodb_log_files_in_group				 		
innodb_log_group_home_dir				 		
Innodb_log_waits	 	 	 			
innodb_log_write_ahead_size				 		
Innodb_log_write_requests	 	 	 			
Innodb_log_writes	 	 	 			
innodb_lru_scan_depth				 		
innodb_max_dirty_pages_pct				 		
innodb_max_dirty_pages_pct_lwm				 		
innodb_max_purge_lag				 		
innodb_max_purge_lag_delay				 		
innodb_max_undo_log_size				 		
innodb_merge_threshold_set_all_debug				 		
innodb_monitor_disable				 		
innodb_monitor_enable				 		
innodb_monitor_reset				 		
innodb_monitor_reset_all				 		
Innodb_num_open_files	 	 	 			
innodb_numa_interleave				 		
innodb_old_blocks_pct				 		
innodb_old_blocks_time				 		
innodb_online_alter_log_max_size				 		
innodb_open_files				 		
innodb_optimize_fulltext_only				 		
innodb_optimize_point_storage				 	Session	
Innodb_os_log_fsyncs	 	 	 			
Innodb_os_log_pending_fsyncs	 	 	 			
Innodb_os_log_pending_writes	 	 	 			
Innodb_os_log_written	 	 	 			
innodb_page_cleaners				 		
Innodb_page_size	 	 	 			
innodb_page_size				 		
Innodb_pages_created	 	 	 			
Innodb_pages_read	 	 	 			
Innodb_pages_written	 	 	 			
innodb_print_all_deadlocks				 		
innodb_purge_batch_size				 		
innodb_purge_rseg_truncate_frequency				 		
innodb_purge_threads				 		
innodb_random_read_ahead				 		
innodb_read_ahead_threshold				 		
innodb_read_io_threads				 		
innodb_read_only				 		
innodb_replication_delay				 		
innodb_rollback_on_timeout				 		
innodb_rollback_segments				 		
Innodb_row_lock_current_waits	 	 	 			
Innodb_row_lock_time	 	 	 			
Innodb_row_lock_time_avg	 	 	 			
Innodb_row_lock_time_max	 	 	 			
Innodb_row_lock_waits	 	 	 			
Innodb_rows_deleted	 	 	 			
Innodb_rows_inserted	 	 	 			
Innodb_rows_read	 	 	 			
Innodb_rows_updated	 	 	 			
innodb_saved_page_number_debug				 		
innodb_sort_buffer_size				 		
innodb_spin_wait_delay				 		
innodb_stats_auto_recalc				 		
innodb_stats_include_delete_marked				 		
innodb_stats_method				 		
innodb_stats_on_metadata				 		
innodb_stats_persistent				 		
innodb_stats_persistent_sample_pages				 		
innodb_stats_sample_pages				 		
innodb_stats_transient_sample_pages				 		
innodb-status-file			 	 	 	 
innodb_status_output				 		
innodb_status_output_locks				 		
innodb_strict_mode				 		
innodb_support_xa				 		
innodb_sync_array_size				 		
innodb_sync_debug				 		
innodb_sync_spin_loops				 		
innodb_table_locks				 		
innodb_temp_data_file_path				 		
innodb_thread_concurrency				 		
innodb_thread_sleep_delay				 		
innodb_tmpdir				 		
Innodb_truncated_status_writes	 	 	 			
innodb_trx_purge_view_update_only_debug				 		
innodb_trx_rseg_n_slots_debug				 		
innodb_undo_directory				 		
innodb_undo_log_truncate				 		
innodb_undo_logs				 		
innodb_undo_tablespaces				 		
innodb_use_native_aio				 		
innodb_use_sys_malloc				 		
innodb_version	 	 		 		
innodb_write_io_threads				 		
mecab_rc_file				 		
ngram_token_size				 		
timed_mutexes				 		
unique_checks	 	 		 		
