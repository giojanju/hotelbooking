import React from 'react';
import TopBar from '../../components/Header/TopBar/TopBar';
import NavBar from '../../components/Header/NavBar/NavBar';

const layout = (props) => {
	return (
		<div>
			<TopBar />
			<NavBar />
			<h1>Header(top_bar, navbar, slider, forms)</h1>
			{/*Routes*/}
			{props.children}
		</div>
	);
};

export default layout;