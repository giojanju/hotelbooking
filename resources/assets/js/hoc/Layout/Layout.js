import React from 'react';

const layout = (props) => {
	return (
		<div>
			<h1>Header(top_bar, navbar, slider, forms)</h1>
			{/*Routes*/}
			{props.children}
		</div>
	);
};

export default layout;