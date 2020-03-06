import React from 'react';
import {Form, Field} from 'react-final-form';

class Choice extends React.Component {

    componentDidMount() {
        this.props.loadChoice();
    }
    submitChoice(data) {
        event.preventDefault();
        let radios = data.currentTarget.querySelectorAll('input:checked');
        let result = [];
        radios.forEach(radio => result.push(radio.value));
        this.props.choicePost(this.props.order_id, result);
    }


    render() {
        const {items, product_name} = this.props;
        return (
            <React.Fragment>
                <div className="activation-title">Вы купили комплект <b>"{product_name}"</b> <br/> Выберите нужный продукт</div>
                <div className="activation-widget">
                    <Form
                        onSubmit={this.submitChoice.bind(this)}
                        render={({handleSubmit, form, values}) => (
                              <form onSubmit={this.submitChoice.bind(this)} className="activation-inputs">
                                  <div className="activation-widget-block">
                                      {
                                          Object.keys(items).map((key) =>
                                              <div className="activation-radios">
                                                  <div className="activation-radios__title">{items[key].SECTION_NAME}</div>
                                                  <ul className="radios-list">
                                                      {
                                                          items[key].ITEMS.map((item) =>
                                                              <li>
                                                                  <div className="radio-block">
                                                                      <Field
                                                                          className="radio"
                                                                          name={'it' + item.IBLOCK_SECTION_ID}
                                                                          type="radio"
                                                                          id={'radio-id-' + item.ID}
                                                                          value={item.ID}
                                                                          component="input"
                                                                          checked={this.value}
                                                                          onChange={this.onChange}
                                                                      />
                                                                      <label htmlFor={'radio-id-' + item.ID} className="radio-label">
                                                                          {item.NAME}
                                                                      </label>
                                                                  </div>
                                                              </li>
                                                          )
                                                      }
                                                  </ul>
                                              </div>
                                          )
                                      }
                                      <div className="activation-submit-block">
                                          <button className="btn" type="submit">
                                              Активировать
                                          </button>
                                      </div>
                                  </div>
                              </form>
                        )}
                    />
                </div>
            </React.Fragment>
        );
    }
}

export default Choice;