import React from 'react';

const pricing = (props) => (
	<div className="col-md-4">
		<div className="pricing-cont">
			<h4>{props.price.title}</h4>
			<span>{props.price.text}</span>
			<h5>{props.price.price}</h5>
			<a className="btn btn-primary">შეიჩინეთ ახლავე</a>
		</div>
	</div>
);

export default pricing;