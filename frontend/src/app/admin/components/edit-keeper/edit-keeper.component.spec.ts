import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EditKeeperComponent } from './edit-keeper.component';

describe('EditKeeperComponent', () => {
  let component: EditKeeperComponent;
  let fixture: ComponentFixture<EditKeeperComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EditKeeperComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EditKeeperComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
