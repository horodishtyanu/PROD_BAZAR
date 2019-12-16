import React from 'react';
import Parser from 'html-react-parser';

class Products extends React.Component{

    componentDidMount() {
        this.props.loadData();
    }

    render() {
        const {items, order, product_name} = this.props;
        return (
            <React.Fragment>
                <div className="activation-title">Вы успешно активировали комплект <br/> <b>{product_name}</b></div>
                <div className="activation-order-number">Номер заказа&nbsp; <span>{order}</span></div>
                <div className="activation-links-title">Ключи для активации продуктов и ссылки на скачивание:</div>
                <div className="activation-widget">
                    {
                        items.map((item, key) =>
                            <div key={key} className="activation-widget-block">
                                <div className="activation-download">
                                    <div className="activation-download__key">{item.name}</div>
                                    <div className="activation-download__body">
                                        {item.key !== null &&
                                        <div className="activation-download__title">
                                            Ключ активации: <b>{Parser(item.key)}</b>
                                        </div>}
                                        {item.preview_text !== null &&
                                        <div className="activation-download__title">
                                            {Parser(item.preview_text)}
                                        </div>}
                                        {item.link !== null &&
                                        <a href={item.link} target="_blank" className="activation-download__link">
                                            <svg width="40" height="14" viewBox="0 0 40 15">
                                                <path
                                                    d="M40.695,6.657l-6.364-6.364c-0.39-0.391-1.024-0.391-1.414,0c-0.391,0.391-0.391,1.024,0,1.414l4.657,4.657 H1c-0.552,0-1,0.448-1,1c0,0.552,0.448,1,1,1h36.574l-4.657,4.657c-0.391,0.391-0.391,1.024,0,1.414c0.39,0.391,1.024,0.391,1.414,0 l6.364-6.364C41.086,7.681,41.086,7.047,40.695,6.657z"/>
                                            </svg>
                                            <span>Информация о продукте</span>
                                        </a>}
                                    </div>
                                </div>
                            </div>
                        )
                    }
                </div>
            </React.Fragment>
        );
    }
}

export default Products;