import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import Layout from './hoc/Layout/Layout';
import Routes from './routes/index';

export default class App extends Component {
    render() {
        return (
            <Layout>
                {/*Routes*/}
                <Routes />
            </Layout>
        );
    }
}


if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}