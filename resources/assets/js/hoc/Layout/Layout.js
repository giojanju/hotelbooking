import React from 'react';
import TopBar from '../../components/Header/TopBar/TopBar';
import NavBar from '../../components/Header/NavBar/NavBar';
import Slider from '../../components/Header/Slider/Slider';
import IncomeCounter from '../../components/Header/IncomeCounter/IncomeCounter';

const layout = (props) => {
	return (
		<div>
			<TopBar />
			<NavBar />
			<Slider />
			<IncomeCounter />
			{props.children}
		</div>
	);
};

export default layout;