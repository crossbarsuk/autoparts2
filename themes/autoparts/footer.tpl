		{if !$content_only}
				</div>

<!-- Right -->
				<div id="right_column" class="column grid_2 omega">
					{$HOOK_RIGHT_COLUMN}
				</div>
			</div>
    </div>


<!-- Footer -->
      <div class="footer_wrap">
        <div class="container_9">
          <div id="footer" class="grid_9 alpha omega clearfix">
            {$HOOK_FOOTER}
            {if $PS_ALLOW_MOBILE_DEVICE}
              <p class="center clearBoth"><a href="{$link->getPageLink('index', true)}?mobile_theme_ok">{l s='Browse the mobile site'}</a></p>
            {/if}
          </div>
        </div>
			</div>
    </div>
		
	{/if}
	</body>
</html>
