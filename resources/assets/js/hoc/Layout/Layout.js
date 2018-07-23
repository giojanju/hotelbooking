import React from 'react';
import TopBar from '../../components/Header/TopBar/TopBar';
import NavBar from '../../components/Header/NavBar/NavBar';
import Slider from '../../components/Header/Slider/Slider';

const layout = (props) => {
	return (
		<div>
			<TopBar />
			<NavBar />
			<Slider />
			<h1>Header(top_bar, navbar, slider, forms)</h1>
			{/*Routes*/}
			{props.children}
		</div>
	);
};

export default layout;