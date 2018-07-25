import React from 'react';
import TopBar from '../../components/Header/TopBar/TopBar';
import NavBar from '../../components/Header/NavBar/NavBar';
import Footer from '../../components/Footer/Footer';

const layout = (props) => {
	return (
		<div>
			<TopBar />
			<NavBar />
			{props.children}
			<Footer />
		</div>
	);
};

export default layout;