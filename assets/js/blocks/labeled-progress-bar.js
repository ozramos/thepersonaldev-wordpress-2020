import {registerBlockType} from '@wordpress/blocks'
import {createElement} from '@wordpress/element'
import {TextControl} from '@wordpress/components'
import {RichText} from '@wordpress/block-editor'

const icon = createElement('svg', {viewBox: '0 0 512 512'},
  createElement('g', {}, 
    createElement('path', {style: {opacity: 0.5}, d: 'M478.71 364.58zm-22 6.11l-27.83-15.9a15.92 15.92 0 0 1-6.94-19.2A184 184 0 1 1 256 72c5.89 0 11.71.29 17.46.83-.74-.07-1.48-.15-2.23-.21-8.49-.69-15.23-7.31-15.23-15.83v-32a16 16 0 0 1 15.34-16C266.24 8.46 261.18 8 256 8 119 8 8 119 8 256s111 248 248 248c98 0 182.42-56.95 222.71-139.42-4.13 7.86-14.23 10.55-22 6.11z'}),
    createElement('path', {d: 'M271.23 72.62c-8.49-.69-15.23-7.31-15.23-15.83V24.73c0-9.11 7.67-16.78 16.77-16.17C401.92 17.18 504 124.67 504 256a246 246 0 0 1-25 108.24c-4 8.17-14.37 11-22.26 6.45l-27.84-15.9c-7.41-4.23-9.83-13.35-6.2-21.07A182.53 182.53 0 0 0 440 256c0-96.49-74.27-175.63-168.77-183.38z'})
  )
)

registerBlockType('tpd/labeled-progress-bar', {
  title: 'Labeled Progress Bar',
  category: 'theme_blocks',
  icon,

  attributes: {
    label: {
      type: 'array',
      source: 'children',
      selector: '.tpd-labeled-progress-bar-label'
    },
    percent: {
      type: 'string',
      default: 0
    }
  },

  edit: props => {
    const {
      className,
      attributes: {label, percent},
      setAttributes
    } = props

    const onChangeLabel = val => {
      setAttributes({label: val})
    }
    const onChangePercent = val => {
      setAttributes({percent: val})
    }

    return (
      <div className={className}>
        <div className="tpd-control-group">
          <RichText
            tagName='div'
            className='tpd-labeled-progress-bar-label'
            placeholder='Label text'
            label='Label'
            onChange={onChangeLabel}
            value={label}
          />
          <TextControl
            label='Percent'
            type='number'
            className='tpd-labeled-progress-bar-percent'
            onChange={onChangePercent}
            value={percent}
          />
        </div>
        <div className='tpd-labeled-progress-bar'>
          <span style={{width: `${percent}%`}}></span>
        </div>
      </div>
    )
  },

  save: props => {
    const {
      className,
      attributes: {label, percent}
    } = props

    return (
      <div className={className}>
        <div className="tpd-control-group">
          <RichText.Content
            className='tpd-labeled-progress-bar-label'
            tagName='div'
            value={label} 
          />
          <div className='tpd-labeled-progress-bar-percent'>{percent}</div>
        </div>
        <div className='tpd-labeled-progress-bar'>
          <span style={{width: `${percent}%`}}></span>
        </div>
      </div>
    )
  }
})