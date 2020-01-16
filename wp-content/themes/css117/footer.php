	<footer>
		<div class="container">

			<div class="row">

				<?php if(is_active_sidebar('widgetized-footer')): ?>

					<?php dynamic_sidebar('widgetized-footer'); ?>

				<?php else:  ?>


					<div class="col-12">
						<p>Lorem ipsum dolor sit amet, consectetur
						 adipisicing elit. Unde accusantium enim dolorum nemo at sint provident, 
						 totam asperiores eveniet animi, maxime aliquam. Sunt optio tenetur 
						 assumenda. Harum, error earum autem porro,</p>
						<p>illum doloremque expedita 
						 quas repellendus fugiat nemo eos, voluptatibus aspernatur mollitia 
						 est iste excepturi neque doloribus officiis esse quod laudantium 
						 cupiditate. Esse, iure voluptatum quos aliquam error quia voluptates
						  sed doloribus facilis tempora commodi</p>
						<p>explicabo fuga officiis 
						  maiores dignissimos laboriosam voluptatem culpa distinctio vel 
						  quasi beatae. Accusantium molestias repellendus debitis, 
						  illum veniam, distinctio beatae quibusdam, illo ipsam commodi 
						  sunt suscipit, nisi reiciendis cumque eum quis iure dolorum laborum dolore!</p>
					</div>


				<?php endif; ?>			</div>

		</div><!-- /container -->
		

	</footer>

<?php wp_footer();  ?> 

</body>
</html>